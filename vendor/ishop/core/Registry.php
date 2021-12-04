<?php

namespace Ishop;

class  Registry 
{
    use TSingletone;

    public static $properties = [];

    public function setProperty($name, $value)
    {      
        self::$properties[$name] = $value;
    }

    public function getProperty($name)
    {
        return isset(self::$properties[$name]) ? self::$properties[$name] : null;
    }

    public static function getProperties()
    {
        return self::$properties;
    }


}