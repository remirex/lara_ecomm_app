Example Laravel Ecommerce-App
=============================

An example Laravel application with shopping cart, payment gateway,admin dashboard.

Instalation
-----------

This is just local installation using something like MAMP/WAMP/LAMP or xampp. Of course you are free to use homestead if you like.

1. clone the repo
2. composer install
3. If you have no .env file you can use the example one. Just rename .env.example to .env. Enter your db credentials here.
4. php artisan key:generate
5. make sure db is running and credentials are setup in config/database.php or in your .env file
6. make php artisan migrate
7. Use Stripe for payment gatway. Set credential in .env file (STRIPE_KEY, STRIPE_SECRET)
8. For the ability to send email in the development environment, we use mailtrap (SET MAILTRAP CREDENTIAL).For the startup we use the following command: php artisan make: mail
9. php artisan serve
10. visit localhost:8000 in your browser