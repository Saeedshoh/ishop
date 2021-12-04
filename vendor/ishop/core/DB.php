<?php

namespace Ishop;

use Exception;
use RedBeanPHP\R;

class DB
{
    use TSingletone;

    public function __construct()
    {
        $db = require_once CONF . '/db.php';
        R::setup($db['dsn'], $db['username'], $db['password']);
        if (!R::testConnection()) {
           throw new Exception('Нет соединение с Баззой данных', 500);
        }

        R::freeze(true);
        DEBUG ? R::debug(true, 1) : '';
    }
}
