<?php

namespace App\Controllers;

use RedBeanPHP\R;

class CurrencyController extends Controller
{
    public function indexAction()
    {
        $brands = R::find('brand', 'LIMIT 3');
        $products = R::find('product', "hit='1' and status='1' LIMIT 8");
        $this->set(compact('brands', 'products'));     
    }
}
