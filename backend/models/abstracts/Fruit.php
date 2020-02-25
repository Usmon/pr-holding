<?php

namespace app\models\abstracts;

/**
 * Abstract class for Fruit
 */
abstract class Fruit extends \yii\db\ActiveRecord
{
    const STATUS_KL = 10;
    const STATUS_JO = 5;
    const STATUS_TY = 0;

    public function eat()
    {
        
    }

    public function fallToGround()
    {
        
    }

    public function remove()
    {
        
    }
}