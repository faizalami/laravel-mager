<!-- installation.md -->

# Installation

## Create a new Laravel project
Create a new Laravel project application to be built, for example you will create an `inventory` application
```bash
$ laravel new inventory
```

## Configure .env file
Adjust the configurations in .env files, the important one is database configurations
```env
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbku2
DB_USERNAME=root
DB_PASSWORD=root
...
```

## Download the package
Download Laravel-Mager package using composer
```bash
$ composer require faizalami/laravel-mager
```

## Register the package
Add the `LaravelMagerServiceProvider` to `config/app.php` to register Laravel-Mager in your Laravel project
```php
'providers' => [
    ...,
    /*
     * Package Service Providers...
     */
    Faizalami\LaravelMager\LaravelMagerServiceProvider::class,
]
```

## Publish configurations and assets
Publish configurations and assets to use Laravel-Mager, configurations and assets including :
* Public assets and plugins
* JSON project configurations
* Base Classes
* Swagger-UI REST Documentation assets
* Base layout views
```bash
$ php artisan vendor:publish --provider="Faizalami\LaravelMager\LaravelMagerServiceProvider" --force
```

## Run the laravel project
Try to run the Laravel project application
```bash
$ php artisan serve
```

## Open Laravel-Mager
Open Laravel-Mager in Laravel local server in `http://host:port/laravel-mager`, for example 
`http://localhost:3000/laravel-mager`
