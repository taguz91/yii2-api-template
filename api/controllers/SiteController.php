<?php

namespace api\controllers;

use common\yii\RestController;

/**
 * Site controller
 */
class SiteController extends RestController
{

    protected function verbs()
    {
        return [
            'index' => ['GET']
        ];
    }

    public function actionIndex()
    {
        return [
            'version' => '1.0.0',
        ];
    }
}
