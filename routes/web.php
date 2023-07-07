<?php

use App\Http\Controllers\customController;
use Beta\Microsoft\Graph\Model\CustomAppScopeAttributesDictionary;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// Route to the Signup page 


Route::middleware(['2fa'])->group(function () {
    Route::get('/auth/signup', [customController::class, 'signup'])->name('signup');
    Route::post('/2fa', function () {
        return redirect(route('signup'));
    })->name('2fa');
});

Route::post('/complete-registration', [customController::class, 'completeRegistration'])->name('register');
Route::get('/enter/otp', [customController::class, 'otp_page'])->name('otp');

Route::post('/verify/otp', [customController::class, 'verifyOtp'])->name('verify');

Route::get('/auth/login', [customController::class, 'login'])->name('login');
Route::post('/login', [customController::class, 'login_user'])->name('login_user');
