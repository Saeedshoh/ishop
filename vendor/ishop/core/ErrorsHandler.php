<?php

namespace Ishop;

class ErrorsHandler 
{
    public function __construct()
    {
        DEBUG ? error_reporting(-1) : error_reporting(0);
        set_exception_handler([$this, 'exeptionHandler']);
    }

    public function exeptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayErrors('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    public function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[". date('Y-m-d H:m:s'). "] Текст ошибки: ". $message . "| Файл {$file} | Строка {$line}\n --------------------------------------------------------------------------------------\n", 3, ROOT.'/tpm/errors.log');
    }

    public function displayErrors($errno, $errstr, $errfile, $errline, $responce = 404)
    {
        http_response_code($responce);
        if($responce == 404 && !DEBUG)
        {
            require WWW.'/errors/404.php';
            die;
        }
        DEBUG ? require WWW. '/errors/dev.php' : require WWW. '/errors/prod.php';
        die;
    }
}