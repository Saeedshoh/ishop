<?php

use Ishop\Router;

require_once dirname(__DIR__).'/config/init.php';
require_once LIBS.'/helpers.php';
require_once CONF.'/routes.php';



new Ishop\App();
// dd(new App\Controllers\MainController);
// dd(Router::getRoutes());