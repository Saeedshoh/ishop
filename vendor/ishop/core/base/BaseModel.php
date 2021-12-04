<?php

namespace Ishop\Base;

use Exception;
use Ishop\DB;

abstract class BaseModel
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        DB::instance();
    }
}
