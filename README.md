# Secure Login and Signup PHP Project

This project is a simple PHP-based login and signup system with enhanced security measures to protect user information. This is also my First upload on Github to display my skills and presentation. You can download it and use, modify, and distribute the code as per the terms of the license.

## Table of Contents
1. [Introduction](#introduction)
2. [Features](#features)
3. [Requirements](#requirements)
4. [Installation](#installation)
5. [Usage](#usage)
6. [Security Measures](#security-measures)
7. [Contributing](#contributing)
8. [License](#license)

## Introduction

The Secure Login and Signup PHP Project is a web application that allows users to register for an account, log in securely, and manage their profile. The project aims to prevent common security issues such as password breaches, SQL injection, and Cross-Site Request Forgery (CSRF) attacks.

## Features

- User Registration: Users can sign up for a new account by providing a unique username, email address, and password.
- Password Hashing: Passwords are hashed using a strong cryptographic algorithm before storing in the database, ensuring that plain text passwords are never stored.
- User Login: Registered users can securely log in using their username and password.
- CSRF Protection: The application includes CSRF protection to prevent unauthorized requests from malicious sources.
- Password Recovery (Adding Soon): Users can initiate a password recovery process through a reset link sent to their registered email address.
- Account Management (Adding Soon): Logged-in users can update their profile information, change their password, and delete their account.

## Requirements

To run this project, you need the following:

- Web Server (Apache, Nginx, etc.)
- PHP 7.0 or later
- MySQL or any other compatible database system

## live Preview
Click on this link to see the live preview of Project : 
[https://urvish-project01.000webhostapp.com/](https://urvish-project01.000webhostapp.com/)

```
Avoid Security Alerts.
  ↳ Deceptive site ahead :
    • click on Details
    • Visit this unsafe site. [See the last line]
    • Click on that link, You can access this site.

  "Don't be afraid of this alert, My site have no SSL support, this site is okey.

    • Use random email and password. (Only for Test and Visiting Purpose)"

```

## Usage

1. Open your web browser and navigate to the project's URL (e.g., `http://localhost/login-signup-php-project`).

2. You will be directed to the login page. If you don't have an account, click on the "Sign Up" link to register.

3. After registering, you can log in using your username and password.

4. Upon successful login, you will be redirected to your profile page, where you can manage your account.

## Security Measures

### Password Hashing

User passwords are hashed using the `password_hash()` function with the `PASSWORD_BCRYPT` algorithm. This ensures that passwords are never stored in plain text format in the database.

### CSRF Protection

CSRF tokens are generated for each user session and included in forms. When users submit a form, the application verifies the token to ensure that the request is legitimate and not coming from an unauthorized source.

### Password Recovery

The password recovery process generates a unique token and sends it to the user's registered email address. This token has a limited expiration time, and the user must use it within the given timeframe to reset their password.

### SQL Injection Prevention

The project uses prepared statements with bound parameters to prevent SQL injection attacks. This technique helps protect against malicious input in database queries.

## Contributing

Contributions to this project are welcome! If you find any issues or want to enhance the security measures further, please submit a pull request.

## License

This project is open-source and available. Feel free to use, modify, and distribute the code as per the terms of the license.
# Signup-login
# Signup-login
