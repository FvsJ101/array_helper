# BASIC ARRAY HELPERS BASED ON LARAVEL

This is just a few basic array helper functions based on the laravel array helper functions.

## Install

Install via [composer](https://packagist.org/packages/michaelm/array_helpers):

1) composer require `michaelm/array_helpers`
2) Run `composer install` and do a `composer dumpautoload -o` to optimise the autoloader.

## Usages

###### Get, Has, Only, Forget
```php
array_expand(['products.desk.price' => 200]);

[
    "products" => [
        "desk" => [
            "price" => 200,
        ],
    ],
]
```

###### First, Where, Last
```php
array_expand(['products.desk.price' => 200]);

[
    "products" => [
        "desk" => [
            "price" => 200,
        ],
    ],
]
```

## Credits

[CodeCourse](https://codecourse.com/) released under the MIT license.