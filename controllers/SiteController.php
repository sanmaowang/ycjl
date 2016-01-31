<?php

namespace app\controllers;

use Yii;
use app\models\Page;
use app\models\Post;
use app\models\Photo;
use app\models\Menu;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\db\Query;
use yii\data\Pagination;

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
        if(Yii::$app->deviceDetect->isMobile()){
            $this->layout = "//mobile";
            $mobile = 'mobile/';
        }else{
            $this->layout = "//home";
            $mobile = '';
        }

        $news = array();
        $news[] = Post::find()->where(['page_id'=>23])->orderBy(['create_date'=>SORT_DESC])->one();
        $news[] = Post::find()->where(['page_id'=>14])->orderBy(['create_date'=>SORT_DESC])->one();
        $news[] = Post::find()->where(['page_id'=>15])->orderBy(['create_date'=>SORT_DESC])->one();
        $news[] = Post::find()->where(['page_id'=>16])->orderBy(['create_date'=>SORT_DESC])->one();

        $staff = Photo::find()->where(['page_id'=>1])->orderBy(['create_date'=>SORT_DESC])->one();

        return $this->render($mobile.'index',[
            'news'=>$news,
            'staff'=>$staff
        ]);
    }

    public function actionSearch($t)
    {
        $search = $t;
        if(Yii::$app->deviceDetect->isMobile()){
            $this->layout = "//mobile";
        }else{
            $this->layout = "//inner";
        }
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
        
        if(Yii::$app->deviceDetect->isMobile()){
            $this->layout = "//mobile";
            $mobile = 'mobile/';
        }else{
            $this->layout = "//inner";
            $mobile = '';
        }

        if($page->parent_id == 0){
            $menu = Menu::find()->where(['position'=>'bottom'])->one();
            $links = explode(',',$menu->content);
            if($page->id == 13){
                $group_news = Post::find()->where(['page_id'=>14])->orderBy(['create_date'=>SORT_DESC])->all();
                $industry_news = Post::find()->where(['page_id'=>15])->orderBy(['create_date'=>SORT_DESC])->limit(6)->all();
                $media_news = Post::find()->where(['page_id'=>16])->orderBy(['create_date'=>SORT_DESC])->limit(6)->all();
                $pic_news = Post::find()->where(['page_id'=>39])->orderBy(['create_date'=>SORT_DESC])->limit(10)->all();
                $headlines = Post::find()->where(['is_headline'=>1])->orderBy(['create_date'=>SORT_DESC])->all();
                return $this->render($mobile.'template/'.$page->template,[
                    'page'=>$page,
                    'group_news'=>$group_news,
                    'industry_news'=>$industry_news,
                    'media_news'=>$media_news,
                    'pic_news'=>$pic_news,
                    'headlines'=>$headlines
                ]);
            }else if(in_array($page->id,$links)){
                return $this->render($mobile.'template/'.$page->template,[
                    'page'=>$page,
                    'menu'=>Page::find()->where(['id'=>$links])->all()
                ]);
            }
            $menu = Page::find()->where(['parent_id'=>$page->id])->orderBy(['display_order'=>SORT_ASC])->all();
            $s = $menu?$menu[0]->slug:null;
            return $this->redirect(['page','slug'=>$s]);
        }else{
            $menu = Page::find()->where(['parent_id'=>$page->parent_id])->orderBy(['display_order'=>SORT_ASC])->all();
        }


        if($page->type == 3){
            $query = Post::find()->where(['page_id' => $page->id]);
            $countQuery = clone $query;
            $pnation = new Pagination(['defaultPageSize' => 10,'totalCount' => $countQuery->count()]);
            $posts = $query->orderBy(['create_date'=>SORT_DESC])->offset($pnation->offset)
              ->limit($pnation->limit)
              ->all();
            return $this->render($mobile.'template/'.$page->template,[
                'page'=>$page,
                'menu'=>$menu,
                'pnation'=>$pnation,
                'posts'=>$posts
            ]);
        }
   
        return $this->render($mobile.'template/'.$page->template,[
            'page'=>$page,
            'menu'=>$menu,
        ]);
    }

    public function actionViewPost($id)
    {
        if(Yii::$app->deviceDetect->isMobile()){
            $this->layout = "//mobile";
            $mobile = 'mobile/';
        }else{
            $this->layout = "//inner";
            $mobile = '';
        }
        $post = $this->findPostModel($id);
        $page = $post->page;
        if($page->parent_id == 0){
            $menu = Page::find()->where(['parent_id'=>$page->id])->all();
        }else{
            $menu = Page::find()->where(['parent_id'=>$page->parent_id])->all();
        }
        return $this->render($mobile.'template/post', [
            'post' => $post,
            'menu'=>$menu
        ]);
    }

    public function actionViewPage($id)
    {
        $page = Page::findOne($id);
        
        return $this->redirect(['site/page',
            'slug' => $page->slug,
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
