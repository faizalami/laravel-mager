<!-- installation.md -->

# Installation

## Create a new Laravel project
Create a new Laravel project application to be built, for example you will create an `inventory` application
```bash
$ laravel new inventory
```

or using `composer create-project`

```bash
$ composer create-project --prefer-dist laravel/laravel inventory
```



## Configure .env file
Adjust the configurations in .env files, the important one is database configurations
attention: use [SQL naming conventions](https://www.sqlstyle.guide/) for database name to avoid errors while creating the database

```env
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=demo
DB_USERNAME=your_username
DB_PASSWORD=your_password
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

Use the `vendor:publish` command with `--force` option to replace existing configurations and assets
```bash
$ php artisan vendor:publish --provider="Faizalami\LaravelMager\LaravelMagerServiceProvider" --force
```

## Run the laravel project
Try to run the Laravel project application using `artisan` command
```bash
$ php artisan serve
```

## Open Laravel-Mager
Open Laravel-Mager in Laravel local server in `http://host:port/laravel-mager`, for example 
`http://localhost:3000/laravel-mager`
