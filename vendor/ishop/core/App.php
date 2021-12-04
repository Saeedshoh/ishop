<?php

namespace Ishop;

class App
{
    public static $app;

    public function __construct()
    {
        self::$app = Registry::instance();
        session_start();
        $this->getParams();
        new ErrorsHandler();
        Router::dispatch(trim($_SERVER['QUERY_STRING'], '/'));
    }


    public function getParams()
    {
        $params = require_once CONF . '/params.php';
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }
}
