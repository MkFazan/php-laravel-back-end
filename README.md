<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Installing

Create .env file whit settings:
> `copy .env.example .env`

Create and connect database in project  `.env`

Install framework core: 
> `composer install`

Generate app key
> `php artisan key:generate`

Run migrations and seeds
> `php artisan migrate:fresh --seed`

# Default credentials
#### Admin:
- Email:  *admin@local.com*
- Password: *password* 

#### Customer:
- Email:  *customer@local.com*
- Password: *password* 
