<?php

namespace app\controllers;

use Yii;
use app\models\Page;
use app\models\Post;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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


    private function tree($arr,$parent_id)
    {
      $tree = array();
      foreach ($arr as $row) {
        if($row['parent_id'] == $parent_id){
          $tmp = $this->tree($arr,$row['id']);
          if($tmp){
            $row['sub']=$tmp;
          }else{
            $row['leaf'] = true;
          }
          $tree[] = $row;
        }
      }
      return $tree;
    }
    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Page::find()->orderBy('display_order asc')->all();

        $pages =  $this->tree($model,0);

        return $this->render('index', [
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();
        $pages = Page::find()->all();
        $request = Yii::$app->request;
        $parent_id = $request->get('page_id', 0);
        if ($model->load(Yii::$app->request->post())) {
            $model->parent_id = $parent_id;
            if($model->type == 4){
                $model->template = 'gallery';
            }else if($model->type == 3){
                if($parent_id == 13){
                    $model->template = 'news';
                }else{
                    $model->template = 'sub-news';
                }
            }else if($model->type == 1){
                $model->template = "links";
            }
            if($model->save()){
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'pages'=>$pages,
                'parent_id'=>$parent_id
            ]);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pages = Page::find()->all();
        if ($model->load(Yii::$app->request->post())) {
            if($model->type == 4){
                $model->template = 'gallery';
            }else if($model->type == 3){
                if($model->parent->id == 13){
                    $model->template = 'news';
                }else{
                    $model->template = "sub-news";
                }
            }else if($model->type == 1){
                $model->template = "links";
            }
            else{
                $model->template = 'page';
            }
            if($model->save()){
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'pages'=>$pages,
                'parent_id'=>$model->parent_id
            ]);
        }
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}
