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
        if($page->parent_id == 0){
            $menu = Page::find()->where(['parent_id'=>$page->id])->all();
            $s = $menu[0]->slug;
            $this->redirect(['page','slug'=>$s]);
        }else{
            $menu = Page::find()->where(['parent_id'=>$page->parent_id])->all();
        }
        $template = 'page';

        if($page->type == 3){
            $template = 'news';
        }
        return $this->render($template,[
            'page'=>$page,
            'menu'=>$menu
        ]);
    }

}
