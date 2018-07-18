<?php

require_once "vendor/autoload.php";

//**** ARRAY GET, HAS, ONLY, FORGET EXAMPLES ****//

/*$user = [
    "name" => "Mike",
    "topics" => [
        "city" => "winning",
        "title" => "here"
    ],
    "country" => [
        ["name" => "Nam"],
        ["name" => "Nam1"],
    ]
];*/

//echo array_get($user, 'topics.city', 'No value');

//var_dump(array_has($user, ['name', 'country.0.name']));

/*$result = array_only($user, ['country', 'topics']);
echo '<pre>',print_r($result,true),'</pre>';*/

/*array_forget($user, 'name');
//array_forget($user, ['name', 'topics', 'country.0']);

echo '<pre>',print_r($user,true),'</pre>';*/

//**** **** ****//

//**** ARRAY FIRST, WHERE, LAST EXAMPLES****//
/*$users = [
   ["name" => "Mike", "score" => 100],
   ["name" => "Tim", "score" => 110],
   ["name" => "Ralf", "score" => 120],
];

$user = array_last($users, function ($value, $key) {
    return array_get($value, 'score') < 110;
});
echo '<pre>',print_r($user,true),'</pre>';*/

/*$user = array_first($users, function ($value, $key){
    
    return array_get($value, 'score') > 110 ;
    
}, 'default value');

var_dump($user);*/

/*$result = array_where($users, function ($value, $key) {
    
    return array_get($value, 'score') > 100;
});

var_dump($result);*/

//**** **** ****//
