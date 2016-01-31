<?php
/**
 * @copyright Copyright (c) 2015 Sanmao
 * @author Sanmao <wang@sanmao.me>
 * @link http://sanmao.me
 * @license http://opensource.org/licenses/MIT
 */
namespace app\widgets;
use app\models\Page;
use app\models\Post;
use app\models\Photo;


class Breadcrumb extends \yii\bootstrap\Widget
{

    public function run()
    {
        if(strpos(\Yii::$app->request->url,"view-post")){
          $post = Post::findOne(\Yii::$app->request->get('id'));
          $current_page = $post->page;
        }else if(strpos(\Yii::$app->request->url,"view-album")){
          $photo = Photo::findOne(\Yii::$app->request->get('id'));
          $current_page = $photo->page;
        }else{
          $slug = \Yii::$app->request->get('slug');
          $current_page = Page::find()->where(['slug'=>$slug])->one();
        }

        $parent = ($current_page->parent_id == 0)?null:Page::findOne($current_page->parent_id);
        
        return $this->render('breadCrumb', [
            'parent' => $parent,
            'current_page'=>$current_page
        ]);
        
    }
}