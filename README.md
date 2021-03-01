
# Laravel Ecommerce Project

## Steps to installation

1. Clone the repo and `cd` into it
2. `composer install`
3. `npm install`
4. Rename  `.env.example` file to `.env` or run code `cp .env.example .env`
5. `php artisan key:generate`
6. Set your database credentials in your `.env` file
7. Set your Stripe credentials in your `.env` file. Specifically `STRIPE_KEY` and `STRIPE_SECRET`
8. Set your `APP_URL` in your `.env` file. This is needed for Voyager to correctly resolve asset URLs.
9. Set `ADMIN_PASSWORD` in your `.env` file if you want to specify an admin password. If not, the default password is 'password'
10. `php artisan migrate` and then `php artisan db:seed` This will migrate the database and run any seeders necessary.
11. `npm run dev`
12. `php artisan serve` 
13. Visit `localhost:8000` in your browser
14. Visit `/admin` if you want to access the Voyager admin backend. Admin User/Password: `admin@admin.com/password`. Admin Web User/Password: `adminweb@adminweb.com/password`

## Windows Users - money_format() issue

The `money_format` function does not work in Windows. Take a look at [this thread](https://stackoverflow.com/questions/6369887/alternative-to-money-format-function-in-php-on-windows-platform/18990145). As an alternative, just use the `number_format` function instead.

1. In `app/helpers.php` replace `money_format` line with `return '$'.number_format($price / 100, 2);`
2. In `app/Product.php` replace `money_format` line with `return '$'.number_format($this->price / 100, 2);`
3. In `config/cart.php` set the `thousand_seperator` to an empty string or you might get a 'non well formed numeric value encountered' error. It conflicts with `number_format`.

