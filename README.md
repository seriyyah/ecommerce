
# Laravel Ecommerce Project

## Steps to installation

1. Use simple comands from Makefile
   1. first start `make start` -- than `make up`
   2. enter container `make docker-exec`
   3. stop docker `make stop`
2. Clone the repo and `cd` into it
3. `composer install`
4. `npm install`
5. Rename  `.env.example` file to `.env` or run code `cp .env.example .env`
6. `php artisan key:generate`
7. Install voyager `php artisan voyager:install`
8. Run commands 
   1. `php artisan vendor:publish --provider="TCG\Voyager\VoyagerServiceProvider"`
   2. `php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"`
9.  Now migrate `DB php artisan migrate`
10. Set `ADMIN_PASSWORD` in your `.env` file if you want to specify an admin password. If not, the default password is 'password'
11. `php artisan migrate` and then `php artisan db:seed` This will migrate the database and run any seeders necessary.
12. `npm run dev`
13. `php artisan serve` 
14. Visit `localhost:8000` in your browser
15. Visit `/admin` if you want to access the Voyager admin backend. Admin User/Password: `admin@admin.com/password`. Admin Web User/Password: `adminweb@adminweb.com/password`
