<?php

namespace api\controllers\v1;

use common\models\User;
use common\yii\RestController;

class UserController extends RestController
{

    public function actionRandom()
    {
        $user = new User();
        $user->username = uniqid('user');
        $user->password_hash = 'hash';
        $user->password_reset_token = uniqid('token');
        $user->verification_token = 'token';
        $user->email = uniqid() . '@example.com';
        $user->auth_key = 'auth';

        return [
            'saved' => $user->save()
        ];
    }

    public function actionAll()
    {
        return User::findAll([
            'status' => 9
        ]);
    }
}
