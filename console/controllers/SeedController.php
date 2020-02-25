<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\User;
use app\models\Profile;

class SeedController extends Controller
{
    public function actionIndex()
    {
        $user = new User([
            'username' => 'admin',
            'password' => '123456',
            'status' => User::STATUS_ACTIVE
        ]);
        $user->save();
    }
}