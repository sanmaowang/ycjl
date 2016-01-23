<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Post;
use app\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\data\Pagination;
/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $request = Yii::$app->request;
        $page_id = $request->get('page_id');

        

        $columns = Page::find()->where(['type'=>3])->all();

        

        if($page_id){

            $query = Post::find()->where(['page_id' => $page_id]);
            $countQuery = clone $query;
            $pnation = new Pagination(['defaultPageSize' => 10,'totalCount' => $countQuery->count()]);
            $post = $query->orderBy(['create_date'=>SORT_DESC])->offset($pnation->offset)
              ->limit($pnation->limit)
              ->all();

        }else{
            $query = Post::find();
            $countQuery = clone $query;
            $pnation = new Pagination(['defaultPageSize' => 10,'totalCount' => $countQuery->count()]);
            $post = $query->orderBy(['create_date'=>SORT_DESC])->offset($pnation->offset)
              ->limit($pnation->limit)
              ->all();
        }


        return $this->render('index', [
            'page_id' => $page_id,
            'pnation'=>$pnation,
            'post'=>$post,
            'columns'=>$columns
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $pages = Page::find()->all();
        $request = Yii::$app->request;
        $model->page_id = $request->get('page_id');
        $model->create_date =  mktime();
        $model->update_date =  mktime();

        if ($model->load(Yii::$app->request->post())) {
            $model->create_date = strtotime($model->create_date);
            $model->update_date = strtotime($model->update_date);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'pages' => $pages,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pages = Page::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->create_date = strtotime($model->create_date);
            $model->update_date = strtotime($model->update_date);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'pages' => $pages,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
