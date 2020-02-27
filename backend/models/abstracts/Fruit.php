<?php

namespace app\models\abstracts;

use DateTime;
use yii\db\Expression;

/**
 * Abstract class for Fruit
 */
abstract class Fruit extends \yii\db\ActiveRecord
{
    /**
     * Status const
     */
    const STATUS_TREE   = 10,
          STATUS_GROUND = 5,
          STATUS_ROTTEN = 0,
          TIME_LIMIT    = 5,
          EAT_PERCENT   = 100;
          
    /**
     * Eat method
     * 
     * @return void
     */
    protected function eat($percent)
    {
        $this->setRotten();
        if($this->getGrounded())
            throw new \Exception('Fruit on tree!');
        
        if(!$this->getRotten())
            throw new \Exception('Rotten fruit!');

        {
            $this->eat_percent = $this->eat_percent - $percent;
            $this->update();
            //Delete if percent 0
            $this->deleteAfterEat();
        }
    }

    /**
     * Set fall status
     * 
     * @return void
     */
    protected function fallToGround()
    {
        if ($this->status != self::STATUS_GROUND) {
            $this->date_fall = new Expression('NOW()');
            $this->status = self::STATUS_GROUND;
            $this->update();
        }
    }

    /**
     * Set rotten status
     * 
     * @return void
     */
    protected function setRotten()
    {
        if ($this->status != self::STATUS_ROTTEN && $this->checkRottenTime()) {
            $this->status = self::STATUS_ROTTEN;
            $this->update();
        }
    }

    /**
     * Get ground
     * 
     * @return bool
     */
    protected function getGrounded()
    {
        return $this->status == self::STATUS_GROUND;
    }

    /**
     * Get Rotten
     * 
     * @return bool
     */
    protected function getRotten()
    {
        return $this->status == self::STATUS_ROTTEN;
    }

    /**
     * Delete
     * 
     * @return bool
     */
    protected function deleteAfterEat()
    {
        if ($this->eat_percent <= 0) {
            $this->delete();

            return true;
        }

        return false;
    }

    /**
     * Check limit of rotten
     * 
     * @return bool
     */
    protected function checkRottenTime()
    {
        $now = new DateTime("now");
        $old = new DateTime($this->date_fall);
        $diff = $old->diff($now);

        if ($diff->format('h') > 5)
            return false;
        
        return true;
    }

    /**
     * Status text
     * 
     * @return string
     */
    protected function getStatus()
    {
        if (self::STATUS_TREE == $this->status) 
            return "On tree";
        if (self::STATUS_GROUND == $this->status) 
            return "On ground";
        if (self::STATUS_ROTTEN == $this->status) 
            return "Rotten";
    }

    /**
     * 
     */
    public function size() 
    {
        return $this->eat_percent / 100;
    }
}