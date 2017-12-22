## About Password Less Authtentication

This app makes it possible for your clients to sign in to your system without making
use of a password; it makes use of a magic link sent to your mail box.

----------------------------------------------------------
## Installation
- cp .env.example .env
Then set up your database.

- composer install
- php artisan migrate

Then get your mailtrap (or any mailing service you want to use) info and set it on the env file

- php artisan serve
