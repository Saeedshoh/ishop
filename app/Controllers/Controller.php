<?php

namespace App\Controllers;

use Ishop\App;
use App\Models\Model;
use Ishop\Base\BaseController;
use App\Widgets\Currency\Currency;

class Controller extends BaseController
{
    public function __construct($route)
    {
        parent::__construct($route);
        new Model();
        setcookie('currency', 'EUR', time() + 3600 * 24 * 7, '/');
        App::$app->setProperty('currincies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currincies')));
        // dd(App::$app->getProperties());
        
    }
}
