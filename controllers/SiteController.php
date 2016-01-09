<?php

namespace app\controllers;

use Yii;
use app\models\Page;
use app\models\Post;
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
            return $this->goHome();
        }
        if($page->parent_id == 0){
            if($page->id == 13){
                return $this->render($page->template,[
                    'page'=>$page,
                ]);
            }
            $menu = Page::find()->where(['parent_id'=>$page->id])->all();
            $s = $menu[0]->slug;
            return $this->redirect(['page','slug'=>$s]);
        }else{
            $menu = Page::find()->where(['parent_id'=>$page->parent_id])->all();
        }
   
        return $this->render($page->template,[
            'page'=>$page,
            'menu'=>$menu
        ]);
    }

    public function actionViewPost($id)
    {
        return $this->render('post', [
            'post' => $this->findPostModel($id),
        ]);
    }

    protected function findPostModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
