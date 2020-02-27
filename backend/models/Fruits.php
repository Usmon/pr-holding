<?php

namespace app\models;

use Yii;
use app\models\abstracts\Fruit;

/**
 * This is the model class for table "fruits".
 *
 * @property int $id
 * @property string $name
 * @property string $color
 * @property int $status
 * @property int $eat_percent
 * @property string $date_appearance
 * @property string $date_fall
 */
class Fruits extends Fruit
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fruits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'color'], 'required'],
            [['status'], 'integer'],
            [['date_appearance', 'date_fall'], 'safe'],
            [['name', 'color'], 'string', 'max' => 255],
            [['eat_percent'], 'integer', 'min' => 0, 'max' => parent::EAT_PERCENT],
            [['eat_percent'], 'default', 'value' => parent::EAT_PERCENT],
            [['status'], 'default', 'value' => parent::STATUS_TREE],
            ['date_fall', 'default', 'value' => NULL]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'color' => 'Color',
            'status' => 'Status',
            'eat_percent' => 'Eat Percent',
            'date_appearance' => 'Date Appearance',
            'date_fall' => 'Date Fall'
        ];
    }

    public function getRotted()
    {
        return $this->checkRottenTime();
    }

    public function getStatusText()
    {
        return $this->getStatus();
    }

    public function getSize()
    {
        return number_format($this->size(), 1);
    }

    public function fall()
    {
        $this->fallToGround();
    }
    
    public function setEat($value)
    {
        $this->eat($value);
    }
}
