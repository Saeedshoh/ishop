<?php

namespace Ishop;

trait TSingletone
{
    public static $instance;


    public static function instance()
    {
        return self::$instance === null ?  self::$instance = new self :  self::$instance;
    }
}
