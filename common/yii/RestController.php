<?php

namespace common\yii;

use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

class RestController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']  = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        $rules = $this->rules();
        if (!empty($rules)) {
            $behaviors['access'] = [
                'class' => AccessControl::class,
                'rules' => $this->rules(),
            ];
        }
        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    protected function verbs()
    {
        return [];
    }

    protected function rules()
    {
        return [];
    }
}
