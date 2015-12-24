<?php

namespace app\controllers;

use Yii;
use app\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout = "//home";
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        $pages = Page::find()->all();

        return $this->render('index',[
            'pages'=>$pages
        ]);
    }

    public function actionPage($slug)
    {   
        $page = Page::find()->where(['slug'=>$slug])->one();

        if($slug == 'home'){
            $this->goHome();
        }
        $page_id = $page->id;
        if($page->parent_id != 0){
            $page_id = $page->parent_id;
        }
        $menu = Page::find()->where(['parent_id'=>$page_id])->all();

        return $this->render('page',[
            'page'=>$page,
            'menu'=>$menu
        ]);
    }

}
