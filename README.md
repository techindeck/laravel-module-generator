# laravel-module-generator

Create laravel application modules inspired by CLEAN design pattern

[Latest Version on Packagist](https://packagist.org/packages/techindeck/laravel-module-generator)

[Total Downloads](https://packagist.org/packages/techindeck/laravel-module-generator)



This package allows you to easily generate a application module followed by [SOLID](https://en.wikipedia.org/wiki/SOLID) Principle and CLEAN Architecture

[<img src="https://cdn-images-1.medium.com/max/1200/1*B7LkQDyDqLN3rRSrNYkETA.jpeg" />](CLEAN)
## Installation

You can install the package via composer:

```bash
composer require techindeck/laravel-module-generator
```

## Usage

You can generate a module using the `make:module <module name>`  on the `Artisan CLI`, will generate a module under `App\Modules` directory in the Laravel application

```php
With all option         :    php artisan make:module 'module' -a
With specific options   :    php artisan make:module 'module' -mpcsg -aurdf
```


Available options:

```php
Shorthand   Options             Description
  -a        --all               create module with all options
  -C        --controller        crate cases controller
  -U        --case              create usecases
  -G        --gateway           crate module gateway
  -R        --repo              create module repository
  -M        --model             create module model
  -F        --request           create gateway form request validation policy

  -c        --add               create usecase add
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
