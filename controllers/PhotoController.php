<?php

namespace app\controllers;

use Yii;
use app\models\Photo;
use app\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Photo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $page_id = $request->get('page_id');
        $search = $request->get('search');

        $columns = Page::find()->where(['type'=>4])->all();

        if($search){
          $query = Photo::find()->where(['like','name',$search])->orWhere(['like', 'content', $search]);

          $countQuery = clone $query;
          $pnation = new Pagination(['defaultPageSize' => 10,'totalCount' => $countQuery->count()]);
          $photo = $query->orderBy(['create_date'=>SORT_DESC])->offset($pnation->offset)
            ->limit($pnation->limit)
            ->all();
          return $this->render('index', [
              'page_id' => $page_id,
              'pnation'=>$pnation,
              'post'=>$post,
              'columns'=>$columns
          ]);
        }

        if($page_id){
            $query = Photo::find()->where(['page_id' => $page_id]);
            $countQuery = clone $query;
            $pnation = new Pagination(['defaultPageSize' => 10,'totalCount' => $countQuery->count()]);
            $photo = $query->orderBy(['create_date'=>SORT_DESC])->offset($pnation->offset)
              ->limit($pnation->limit)
              ->all();
        }else{
            $query = Photo::find();
            $countQuery = clone $query;
            $pnation = new Pagination(['defaultPageSize' => 10,'totalCount' => $countQuery->count()]);
            $photo = $query->orderBy(['create_date'=>SORT_DESC])->offset($pnation->offset)
              ->limit($pnation->limit)
              ->all();
        }


        return $this->render('index', [
            'page_id' => $page_id,
            'pnation'=>$pnation,
            'photo'=>$photo,
            'columns'=>$columns
        ]);
    }

    /**
     * Displays a single Photo model.
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
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Photo();
        $request = Yii::$app->request;
        $page_id = $request->get('page_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'page_id' => $page_id
            ]);
        }
    }

    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Photo model.
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
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Photo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
