<?php

namespace api\controllers;

use yii\rest\Controller as RestController;

/**
 * Site controller
 */
class SiteController extends RestController
{
    public function actionIndex()
    {
        return [
            'version' => '1.0.0',
        ];
    }
}