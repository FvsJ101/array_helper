<?php

use App\Support\ArrayHelper;


function array_get($array, $keys, $default = NULL)
{
    return ArrayHelper::get($array, $keys, $default);
}

function array_first($array, $callback = NULL , $default = NULL)
{
    return ArrayHelper::first($array, $callback, $default);
}

function array_last($array, $callback = NULL , $default = NULL)
{
    return ArrayHelper::last($array, $callback , $default);
}

function array_has($array, $key)
{
    return ArrayHelper::has($array, $key);
}

function array_where($array, $callback)
{
    return ArrayHelper::where($array, $callback);
}

function array_only($array, $keys)
{
    return ArrayHelper::only($array, $keys);
}

function array_forget(&$array, $keys)
{
    return ArrayHelper::forget($array, $keys);
}