<?php 

namespace Ishop\Base;

abstract class BaseController 
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $data = [];
    public $meta = ['title' => 'Главная страница', 'keyword' => 'Ключ', 'description' => 'description'];

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function getView()
    {
        $viewObject = new BaseView($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function setMeta($title = '', $keyword = '', $description = '')
    {
        $this->meta['title'] = $title;
        $this->meta['keyword'] = $keyword;
        $this->meta['description'] = $description;
    }
}