<?php

namespace app\models;

use Yii;

class Apple extends Fruits
{   
    /**
     * Name of fruit
     * @var string
     */
    public static $NAME = 'apple';

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->name = self::$NAME;
        parent::__construct();
    }
    
}
