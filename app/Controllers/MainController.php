<?php

namespace App\Controllers;

use Ishop\Cache;
use RedBeanPHP\R;

class MainController extends Controller
{
    public function indexAction()
    {
        $brands = R::find('brand', 'LIMIT 3');
        $products = R::find('product', "hit='1' and status='1' LIMIT 8");
        $this->set(compact('brands', 'products'));     
    }
}
