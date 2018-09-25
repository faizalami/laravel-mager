## Laravel-Mager

Laravel package for design and generate a ready to use application.

### Installation

#### Download the package via Composer
```bash
$ composer require faizalami/laravel-mager
```

#### Register the package in config/app.php
```php
'providers' => [
    ...,
    /*
     * Package Service Providers...
     */
    Faizalami\LaravelMager\LaravelMagerServiceProvider::class,
]
```

#### Publish configuration and assets
```bash
$ php artisan vendor:publish --provider="Faizalami\LaravelMager\LaravelMagerServiceProvider"
```
