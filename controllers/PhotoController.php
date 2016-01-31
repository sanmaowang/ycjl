<?php

namespace app\controllers;

use Yii;
use app\models\Photo;
use app\models\Page;
use app\models\UploadForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\UploadedFile;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
{
    public $enableCsrfValidation = false;
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
          $query = Photo::find()->where(['like','title',$search]);

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
            $query = Photo::find()->where(['page_id' => $page_id,'parent_id'=>0]);
            $countQuery = clone $query;
            $pnation = new Pagination(['defaultPageSize' => 10,'totalCount' => $countQuery->count()]);
            $photo = $query->orderBy(['create_date'=>SORT_DESC])->offset($pnation->offset)
              ->limit($pnation->limit)
              ->all();
        }else{
            $query = Photo::find()->where(['parent_id'=>0])->andWhere(['>','page_id',1]);
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


    public function actionView($id)
    {
        $album = $this->findModel($id);
        
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                $date = date("Ymd",time());
                foreach ($model->imageFiles as $key => $image) {
                    $path = 'uploads/picnews/'.$date.'/';  
                    $photo = new Photo();
                    $photo->path = $path. $image->baseName . '.' . $image->extension;
                    $photo->page_id = $album->page_id;
                    $photo->parent_id = $album->id;
                    $photo->save();
                }
                return $this->redirect(['view','id'=>$album->id]);
            }
        }

        $photos = Photo::find()->where(['parent_id'=>$id])->all();

        return $this->render('album',[
            'photos' => $photos,
            'parent_id'=>$id,
            'page_id'=>$album->page_id,
            'model'=>$model,
            'album'=>$album
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

        if ($model->load(Yii::$app->request->post())) {
            $model->page_id = $page_id;
            $model->parent_id = 0;
            if($model->save()){
                return $this->redirect(['view-album', 'id' => $model->id,'page_id'=>$page_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'page_id' => $page_id
        ]);
    }

    public function actionHome()
    {
        $request = Yii::$app->request;
        $page_id = $request->get('page_id');
        $photo = Photo::find()->where(['page_id'=>$page_id])->orderBy('create_date desc')->one();
        $request = Yii::$app->request;

        $model = new UploadForm();
        if(Yii::$app->request->isPost){
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                $date = date("Ymd",time());
                foreach ($model->imageFiles as $key => $image) {
                    $path = 'uploads/picnews/'.$date.'/';  
                    $photo = new Photo();
                    $photo->path = $path. $image->baseName . '.' . $image->extension;
                    $photo->page_id = $page_id;
                    $photo->parent_id = 0;
                    $photo->save();
                }
                return $this->redirect(['home','page_id'=>$page_id]);
            }
            var_dump($model->getErrors());
        }else{
            return $this->render('home', [
                'model' => $model,
                'photo' =>$photo
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
            return $this->redirect(['view-album', 'id' => $model->parent_id,'page_id'=>$model->page_id]);
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
        $model = $this->findModel($id);
        $album = $this->findModel($model->parent_id);
        if($model->delete()){
            return $this->redirect(['view','id'=>$album->id]);
        }
    }

    public function actionSetcover($id)
    {
        $model = $this->findModel($id);
        $album = $this->findModel($model->parent_id);
        $album->path = $model->path;
        if($album->save()){
            return $this->redirect(['view','id'=>$album->id]);
        }
    }

    public function actionUnsetcover($id)
    {
        // $this->findModel($id)->delete();

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
