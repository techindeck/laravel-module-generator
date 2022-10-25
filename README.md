# laravel-module-generator

Create laravel application modules inspired by CLEAN & SOLID design pattern

[Latest Version on Packagist](https://packagist.org/packages/techindeck/laravel-module-generator)

[Total Downloads](https://packagist.org/packages/techindeck/laravel-module-generator)

This package allows you to easily generate a application module followed by
[<img src="https://cdn-images-1.medium.com/max/1200/1*B7LkQDyDqLN3rRSrNYkETA.jpeg" />](CLEAN) and SOLID design pattern.

## Installation

You can install the package via composer:

```bash
composer require techindeck/laravel-module-generator
```

## Usage

You can generate a module using the `make:module` on the `Artisan CLI`.

```php
php artisan make:module 'module' -mpcsg -aurdf
```

Available options:

```php
Shorthand   Options             Description
  -c        --controller        crate cases controller
  -s        --case              create usecases
  -g        --gateway           crate module gateway
  -p        --repo              create module repository
  -m        --model             create module model

  -a        --add               create usecase add
  -u        --update            create usecase update
  -r        --read              create usecase read
  -d        --delete            create usecase delete
  -f        --find              create usecase find

```

When using a module command to generating a module, you will need that options create entities followed by CLEAN pattern.

## Direct Usage

This package aims to be very lightweight and easy to use. If you need to create individually of any options `case, controller, gateway, repo, model`, consider using of one these alternatives:

```php
Usecases Example
- php artisan module:case-create 'name'
- php artisan module:case-update 'name'
- php artisan module:case-read 'name'
- php artisan module:case-delete 'name'
- php artisan module:case-find 'name'
```

```php
Usecases Controller Example
- php artisan module:controller-create 'name'
- php artisan module:controller-update 'name'
- php artisan module:controller-read 'name'
- php artisan module:controller-delete 'name'
- php artisan module:controller-find 'name'
```

```php
Usecases Gateway Example
- php artisan module:gateway 'name'

```

```php
Usecases Model Example
- php artisan module:model 'name'

```

```php
Usecases Repository Example
- php artisan module:repository 'name'

```

## Credits

- [Techindeck](https://github.com/techindeck)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
