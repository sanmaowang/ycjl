<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '资源管理');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '资源管理', 'items' => [
                    ['label' => '全部资源', 'url' => ['page/index']],
                ]],
            ];

?>
<?php
 function my_scandir($dir)
{
    $files=array();
    if(is_dir($dir))
     {
        if($handle=opendir($dir))
         {
            while(($file=readdir($handle))!==false)
             {
                if($file!="." && $file!="..")
                 {
                    if(is_dir($dir."/".$file))
                     {
                        $files[$file]=my_scandir($dir."/".$file);
                     }
                    else
                     {
                        $files[]=$dir."/".$file;
                     }
                 }
             }
            closedir($handle);
            return $files;
         }       
     }   
}
?>
<div class="page-index">
  <h2><?= Html::encode($this->title) ?></h2>
    <?php $files = my_scandir($path);?>
  <table class="table">
      <tr>
          <td>序号</td>
          <td>预览</td>
          <td>文件名</td>
          <td>操作</td>
      </tr>
      <?php foreach ($files as $key => $file) {
        if(is_array($file)){
          $i = 0;
          echo "<tr><td colspan='5'><b>文件夹:".$key."</b></tr>";
          foreach ($file as $key => $f) { $i++;?>
        <tr>
          <td><?= $i?></td>
          <td><?php $o = str_replace($path,"",$f);?>
            <a href="<?= Yii::$app->request->baseUrl;?><?= "'/uploads/ueditor/image/'".$o;?>">
              <img src="<?= Yii::$app->request->baseUrl;?><?= "/uploads/ueditor/image/".$o;?>" alt="" width="200">
            </a>
          </td>
          <td><?= $f;?></td>
          <td></td>
        </tr>    
      <?php }
        }}
      ?>
        
  </table>
</div>
