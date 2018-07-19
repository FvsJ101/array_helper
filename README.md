# BASIC ARRAY HELPERS BASED ON LARAVEL

This is just a few basic array helper functions based on the laravel array helper functions.

## Install

Install via [composer](https://packagist.org/packages/michaelm/array_helpers):

1) composer require `michaelm/array_helpers`
2) Run `composer install` and do a `composer dumpautoload -o` to optimise the autoloader.

## Usages

###### Get, Has, Only, Forget
```php
$user = [
    "name" => "Mike",
    "topics" => [
        "city" => "Pretoria",
        "title" => "Winning"
    ],
    "country" => [
        ["name" => "UK"],
        ["name" => "USA"],
    ]
];

echo array_get($user, 'topics.city', 'Default value');

var_dump(array_has($user, ['name', 'country.0.name']));

$result = array_only($user, ['country', 'topics']);
echo '<pre>',print_r($result,true),'</pre>';

array_forget($user, 'name');
//array_forget($user, ['name', 'topics', 'country.0']);

echo '<pre>',print_r($user,true),'</pre>';

```

###### First, Where, Last
```php

$users = [
   ["name" => "Mike", "score" => 100],
   ["name" => "Tim", "score" => 110],
   ["name" => "Ralf", "score" => 120],
];

$user = array_last($users, function ($value, $key) {
    return array_get($value, 'score') < 110;
});

echo '<pre>',print_r($user,true),'</pre>';

$user = array_first($users, function ($value, $key){
    
    return array_get($value, 'score') > 110 ;
    
}, 'default value');

var_dump($user);

$result = array_where($users, function ($value, $key) {
    
    return array_get($value, 'score') > 100;
});

var_dump($result);

```

## Credits

[CodeCourse](https://codecourse.com/) released under the MIT license.