<?php

namespace app\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SourceController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'access' =>[
                'class' =>\yii\filters\AccessControl::className(),
                'only' => ['create', 'update', 'index', 'view', 'delete'],
                'rules' => [
                    //allow only admin to modify backend users(Admin class)
                    [
                        'allow'=>true,
                        'roles' => ['@'],
                    ]
                    //everything else is denied.
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $path = \Yii::getAlias('@webroot').DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'ueditor'.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR;
        return $this->render('index',['path'=>$path]);
    }

}
