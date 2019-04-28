# Installation

## Download the package via Composer
```bash
$ composer require faizalami/laravel-mager
```

## Register the package in config/app.php
```php
'providers' => [
    ...,
    /*
     * Package Service Providers...
     */
    Faizalami\LaravelMager\LaravelMagerServiceProvider::class,
]
```

## Publish configuration and assets
```bash
$ php artisan vendor:publish --provider="Faizalami\LaravelMager\LaravelMagerServiceProvider" --force
```

## Run the laravel project
```bash
$ php artisan serve
```

## Open Laravel-Mager
`http://host:port/laravel-mager`
