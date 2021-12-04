<?php

namespace App\Widgets\Currency;

use Ishop\App;
use RedBeanPHP\R;

class Currency 
{
    protected $tpl;
    protected $currencies;
    protected $currency;

    public function __construct() {
        $this->tpl = __DIR__.'/currency_tpl/currency.php';
        $this->run();
    }

    public function run()
    {
        $this->currency =  App::$app->getProperty('currency');
        $this->currencies =  App::$app->getProperty('currincies');
        echo $this->getHtml();
    }


    public static function getCurrencies()
    {
        return R::getAssoc("SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC");
    }

    public static function getCurrency($carrencies)
    {
        if(isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $carrencies))
        {
            $key = $_COOKIE['currency'];
        }

        else {
            $key = key($carrencies);
        }
        $currency = $carrencies[$key];
        $currency['code']  = $key;
        return $currency;
    }
    

    public  function getHtml()
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }

}