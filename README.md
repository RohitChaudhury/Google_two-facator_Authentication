# Google Two-Factor Authentication

Google Two-Factor Authentication is a Laravel project that demonstrates the implementation of two-factor authentication using Google Authenticator.

## Project Description

This project showcases the integration of Google Authenticator for implementing two-factor authentication in a Laravel application. It allows users to register, login, and verify their accounts using the Google Authenticator app.

## Features

- User registration with email and password
- Two-factor authentication using Google Authenticator
- QR code generation for scanning in the Google Authenticator app
- Account verification with the entered OTP

## Installation

1. Clone the repository: `git clone https://github.com/RohitChaudhury/Google_two-facator_Authentication.git`
2. Set up the Laravel environment and dependencies: `composer install`
3. Copy the `.env.example` file to `.env` and update the database configuration.
4. Import the database schema from `database/users.sql`.
5. Generate a new application key: `php artisan key:generate`
6. Start the development server: `php artisan serve`

## Usage

1. Access the application in your browser at `http://localhost:8000`.
2. Register a new user account.
3. Set up two-factor authentication with Google Authenticator.
4. Verify the account by entering the OTP from the Google Authenticator app.
5. Log in with your registered credentials and the generated OTP.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
