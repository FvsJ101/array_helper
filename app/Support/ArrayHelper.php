<?php


namespace App\Support;

use ArrayAccess;

class ArrayHelper
{
    
    /**
     * @param $array
     * @return bool
     */
    public static function accessible($array)
    {
        return is_array($array) || $array instanceof ArrayAccess;
    }
    
    /**
     * @param $array
     * @param $key
     * @return bool
     */
    public static function exists($array, $key)
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }
        
        return array_key_exists($key, $array);
    }
    
    /**
     * @param $array
     * @param $keys
     * @param null $default
     * @return null
     */
    public static function get($array, $keys, $default = NULL)
    {
        
        if (!static::accessible($array)) {
            return $default;
        }
        
        if (is_null($keys)) {
            return $array;
        }
        
        if (static::exists($array, $keys)) {
            return $array[$keys];
        }
        
        foreach (explode('.', $keys) as $segment) {
            
            if (static::accessible($array) && static::exists($array, $segment)) {
                
                $array = $array[$segment];
            } else {
                
                return $default;
            }
        }
        
        return $array;
        
    }
    
    /**
     * @param $array
     * @param null $callback
     * @param null $default
     * @return null
     */
    public static function first($array, $callback = NULL, $default = NULL)
    {
        
        if (is_null($callback)) {
            
            if (empty($array)) {
                return $default;
            }
            
            foreach ($array as $entry) {
                return $entry;
            }
            
        }
        
        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                return $value;
            }
        }
        
        
        return $default;
    }
    
    public static function where($array, $callback)
    {
        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }
    
    public static function only($array, $keys)
    {
        
        return array_intersect_key($array, array_flip((array) $keys));
  
    }
    
    public static function last($array, $callback = NULL, $default = NULL)
    {
        if (is_null($callback)) {
        
            if (empty($array)) {
                return $default;
            }
        
            return end($array);
        
        }

        return static::first( array_reverse($array, true), $callback, $default);
        
    }
    
    public static function forget(&$array, $keys)
    {
        
        $original = &$array;
        $keys = (array) $keys;
    
        foreach ($keys as $key) {
    
            if (static::exists($array, $key)) {
                unset($array[$key]);
                continue;
            }
            
            $parts = explode('.', $key);
            
            $array = &$original;
            
            while (count($parts) > 1) {
                $part = array_shift($parts);
    
                if (static::accessible($array) && static::exists($array, $part)) {
    
                    $array = &$array[$part];
                } else {
        
                    continue 2;
                }
                
            }
            
            unset($array[array_shift($parts)]);
            
            
        }
        
    }
    
    /**
     * @param $array
     * @param mixed $key
     * @return bool
     */
    public static function has($array, $key)
    {
        if (is_null($key)) {
            return false;
        }
        
        $keys = (array)$key;
        
        if ($keys === [])
            return false;
        
        foreach ($keys as $key) {
            
            $subKeyArray = $array;
            
            if (static::exists($array, $key)) {
                continue;
            }
            
            foreach (explode('.', $key) as $segment) {
                
                if (static::accessible($subKeyArray) && static::exists($subKeyArray, $segment)) {
                    
                    $subKeyArray = $subKeyArray[$segment];
                } else {
                    
                    return false;
                }
            }
            
        }
        
        return true;
    }
    
}