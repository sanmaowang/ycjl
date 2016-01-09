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


class Menu extends \yii\bootstrap\Widget
{

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

    public function run()
    {
        $model = Page::find()->all();
        $pages =  $this->tree($model,0);
        if(strpos(\Yii::$app->request->url,"view-post")){
          $post = Post::findOne(\Yii::$app->request->get('id'));
          $current_page = $post->page;
        }else{
          $slug = \Yii::$app->request->get('slug');
          $current_page = Page::find()->where(['slug'=>$slug])->one();
        }
        return $this->render('cateWidget', [
            'pages' => $pages,
            'current_page'=>$current_page
        ]);
        
    }
}