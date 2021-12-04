<?php

namespace Ishop\Base;

use Exception;

class BaseView
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $data = [];
    public $meta = [];
    public $layout;

    public function __construct($route, $layout = '', $view = '', $meta = '')
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?? LAYOUT;
        }
    }


    public function render($data)
    {
        is_array($data) ? extract($data) : '';
        $viewFile = APP . "/Views/{$this->prefix}{$this->controller}/$this->view.php";
        if (is_file($viewFile)) {
            ob_start();
            require $viewFile;
            $content = ob_get_clean();
        } else {
            throw new Exception("Не найден вид $viewFile", 500);
        }
        if ($this->layout !== false) {
            $layoutFile = APP . "/Views/Layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new Exception("Не найден шаблон $layoutFile", 500);
            }
        }
    }
}
