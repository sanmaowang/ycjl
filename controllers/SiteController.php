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
use yii\db\Query;

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
        $this->layout = "//home";
        $news = Post::find()->where(['page_id'=>14])->orderBy(['create_date'=>SORT_DESC])->all();

        return $this->render('index',[
            'news'=>$news
        ]);
    }

    public function actionSearch($t)
    {
        $search = $t;
        $model = Post::find()->where(['like','content', $search])->limit(8)->all();
        // $pageQuery = new Query();
        // $t = $pageQuery->select('id,name,content,update_date')->from('page')
        //     ->where(['like','content', $search])
        //     ->limit(10);
        // $postQuery->union($pageQuery);  
        return $this->render('search_result',[
            'model'=>$model,
            'search_key'=>$t
        ]);
    }

    public function actionPage($slug)
    {   
        $page = Page::find()->where(['slug'=>$slug])->one();

        if($slug == 'home'){
            return $this->goHome();
        }
        
        $this->layout = "//inner";

        if($page->parent_id == 0){
            if($page->id == 13){
                $group_news = Post::find()->where(['page_id'=>14])->orderBy(['create_date'=>SORT_DESC])->all();
                $industry_news = Post::find()->where(['page_id'=>15])->orderBy(['create_date'=>SORT_DESC])->all();
                $media_news = Post::find()->where(['page_id'=>16])->orderBy(['create_date'=>SORT_DESC])->all();
                $headlines = Post::find()->where(['is_headline'=>1])->orderBy(['create_date'=>SORT_DESC])->all();
                return $this->render('template/'.$page->template,[
                    'page'=>$page,
                    'group_news'=>$group_news,
                    'industry_news'=>$industry_news,
                    'media_news'=>$media_news,
                    'headlines'=>$headlines
                ]);
            }
            $menu = Page::find()->where(['parent_id'=>$page->id])->all();
            $s = $menu[0]->slug;
            return $this->redirect(['page','slug'=>$s]);
        }else{
            $menu = Page::find()->where(['parent_id'=>$page->parent_id])->all();
        }
   
        return $this->render('template/'.$page->template,[
            'page'=>$page,
            'menu'=>$menu
        ]);
    }

    public function actionViewPost($id)
    {
        $this->layout = "//inner";
        $post = $this->findPostModel($id);
        $page = $post->page;
        if($page->parent_id == 0){
            $menu = Page::find()->where(['parent_id'=>$page->id])->all();
        }else{
            $menu = Page::find()->where(['parent_id'=>$page->parent_id])->all();
        }
        return $this->render('template/post', [
            'post' => $post,
            'menu'=>$menu
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
