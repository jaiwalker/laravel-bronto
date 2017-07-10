# Laravel Bronto Integration

## Installation

First, pull in the package through Composer.

Run `composer require jaiwalker/bronto-laravel`

And then, if using Laravel 5.2, include the service provider within `config/app.php`.

```php
'providers' => [
   Jaiwalker\BrontoApi\BrontoServiceProvider::class,
];
```

To publish config run 

```php
php artisan vendor:publish --provider="Jaiwalker\BrontoApi\BrontoServiceProvider"
```
This should create a file {bronto} in config folder.

## Usage

Within your controllers, before you use 

```php
public function whatever()
{
   BrontoApi::contact()->updateOrCreate(); 
   BrontoApi::contact()->getContactByEmail(); 
   BrontoApi::contact()->updateByEmail(); 
}
```


