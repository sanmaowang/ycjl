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
setlocale(LC_ALL, 'zh_CN.GBK'); 
/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
{
    public $enableCsrfValidation = false;
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
     * Lists all Photo models.
     * @return mixed
     */
    private function getExtinfo($str){
      $ext = 'gif|jpg|jpeg|bmp|png';//罗列图片后缀从而实现多扩展名匹配 by http://www.k686.com 绿色软件

      $list = array();  //这里存放结果map
      $c1 = preg_match_all('/<img\s.*?>/', $str, $m1);  //先取出所有img标签文本
      for($i=0; $i<$c1; $i++) { //对所有的img标签进行取属性
        $c2 = preg_match_all('/(\w+)\s*=\s*(?:(?:(["\'])(.*?)(?=\2))|([^\/\s]*))/', $m1[0][$i], $m2); //匹配出所有的属性
        for($j=0; $j<$c2; $j++) { //将匹配完的结果进行结构重组
          $list[$i][$m2[1][$j]] = !empty($m2[4][$j]) ? $m2[4][$j] : $m2[3][$j];
        }
      }
      return $list; //查看结果变量
    }
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
                    $path = '/uploads/picnews/'.$date.'/';  
                    $photo = new Photo();
                    $photo->path = $path. $image->baseName . '.' . $image->extension;
                    $photo->page_id = $album->page_id;
                    $photo->parent_id = $album->id;
                    $photo->create_date =  time();
                    $photo->update_date =  time();
                    $photo->save();
                }
                return $this->redirect(['view','id'=>$album->id]);
            }
        }

        $photos = Photo::find()->where(['parent_id'=>$id])->orderBy('order asc')->all();

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
        $model->create_date =  time();
        $model->update_date =  time();

        if ($model->load(Yii::$app->request->post())) {
            $model->page_id = $page_id;
            $model->parent_id = 0;
            $model->create_date = strtotime($model->create_date);
            $model->update_date = strtotime($model->update_date);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id,'page_id'=>$page_id]);
            }
        }
        $page = Page::findOne($page_id);

        return $this->render('create', [
            'model' => $model,
            'page_id' => $page_id,
            'page'=>$page
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
                    $path = '/uploads/picnews/'.$date.'/';  
                    $photo = new Photo();
                    $photo->path = $path. $image->baseName . '.' . $image->extension;
                    $photo->page_id = $page_id;
                    $photo->parent_id = 0;
                    $photo->create_date =  time();
                    $photo->update_date =  time();
                    $photo->save();
                }
                return $this->redirect(['home','page_id'=>$page_id]);
            }
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
        if ($model->load(Yii::$app->request->post())) {
          $model->create_date = strtotime($model->create_date);
          $model->update_date = strtotime($model->update_date);
           if($model->save()){
              return $this->redirect(['update','id'=>$id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatephoto($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
         if($model->save()){
            return $this->redirect(['view','id'=>$model->parent_id]);
          }
        } else {
            return $this->render('update', [
                'model' => $model,
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
        $model = $this->findModel($id);
        $parent_id = $model->parent_id;
        if($model->delete()){
          if(isset($parent_id) && $parent_id >0){
            $album = $this->findModel($parent_id);
            return $this->redirect(['view','id'=>$album->id]);
          }else{
            return $this->redirect(['index']);
          }
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
