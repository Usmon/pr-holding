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
 * @property string $deleted_at
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
            [['name', 'color', 'status', 'eat_percent'], 'required'],
            [['status', 'eat_percent'], 'integer'],
            [['date_appearance', 'date_fall', 'deleted_at'], 'safe'],
            [['name', 'color'], 'string', 'max' => 255],
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
            'date_fall' => 'Date Fall',
            'deleted_at' => 'Deleted At',
        ];
    }
}
