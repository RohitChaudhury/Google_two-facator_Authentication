<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FAQRCode\Google2FA;

class customController extends Controller
{

    // use RegistersUsers {
    //     register as registration;
    // }
    public function signup()
    {
        return view('signup');
    }
    public function login()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            'password_confirmation' => 'required',
            'accept' => 'accepted'
        ], [
            'password.regex' => 'The password must include at least one lowercase letter, one uppercase letter, one digit, and one special character.',
            'accept.accepted' => 'Please accept the terms and conditions.'
        ]);

        $google2fa = app('pragmarx.google2fa');
        $registration_data = $request->all();
        $registration_data['google2fa_secret'] = $google2fa->generateSecretKey();

        $request->session()->put('registration_data', $registration_data);

        $twofa = new Google2FA;
        $key = $twofa->generateSecretKey();

        $QR_Image = base64_encode($twofa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        ));

        $secret = $registration_data['google2fa_secret'];
        return view('google.register', compact('QR_Image', 'secret'))->with('registration_data', $registration_data);
    }


    public function completeRegistration(Request $request)
    {
        $request->merge(session('registration_data'));
        return $this->register($request);
    }

    public function otp_page()
    {
        return view('google.index');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

        $otp = $request->input('otp');
        $registration_data = $request->session()->get('registration_data');
        $google2fa = new Google2FA();

        // Verify the OTP using the Google2FA library
        $isValidOtp = $google2fa->verifyKey($registration_data['google2fa_secret'], $otp);

        if ($isValidOtp) {
            // OTP verification successful
            $user = new User;

            $user->email = $registration_data['email'];
            $user->username = $registration_data['username'];
            $user->password = Hash::make($registration_data['password']);
            $user->google2fa_secret = $registration_data['google2fa_secret'];
            $save = $user->save();


            if ($save) {
                session()->flash('success', 'Your account has been created successfully');
                return redirect()->route('signup');
            }
        } else {
            // OTP verification failed
            return redirect()->back()->withErrors(['Invalid OTP. Please enter the correct OTP visible in app.']);
        }

        return redirect()->route('verification');
    }


    public function login_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Authentication successful
            session()->flash('success', 'Success! You have been looged in to Auth.');
            return redirect()->route('login');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}
