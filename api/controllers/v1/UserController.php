<?php

namespace api\controllers\v1;

use api\models\CreateUserRequest;
use api\models\LoginRequest;
use common\models\User;
use common\yii\RestController;
use Yii;

class UserController extends RestController
{

    protected function verbs()
    {
        return [
            'create' => ['POST', 'HEAD'],
            'all'    => ['GET', 'HEAD'],
            'random' => ['GET', 'HEAD'],
            'login'  => ['POST', 'HEAD'],
        ];
    }

    public function actionRandom()
    {
        $user = new User();
        $user->username = uniqid('user.');
        $user->email = uniqid() . '@example.com';
        $user->setPassword(uniqid('PASS'));
        return [
            'saved' => $user->save()
        ];
    }

    public function actionCreate()
    {
        $request = (new CreateUserRequest())
            ->post();

        if ($request->signup()) {
            statusCode(201);
            return $request->getUser();
        }

        statusCode(400);
        return [
            'errors'  => $request->getErrors(),
            'summary' => $request->getErrorSummary(true),
        ];
    }

    public function actionLogin()
    {
        $request = (new LoginRequest())
            ->post();

        if ($request->login()) {
            return $request->getUser();
        }
        statusCode(400);
        return [
            'errors'  => $request->getErrors(),
            'summary' => $request->getErrorSummary(true),
        ];
    }

    public function actionAll()
    {
        return User::findAll([
            'status' => 9
        ]);
    }
}
