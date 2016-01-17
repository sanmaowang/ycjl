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
                    ['label' => '全部上传资源', 'url' => ['page/index']],
                ]],
            ];

function listDir($dir)
{
    if(is_dir($dir))
    {
        if ($dh = opendir($dir)) 
        {
            while (($file = readdir($dh)) !== false)
            {
                if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
                {
                    echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
                    listDir($dir."/".$file."/");
                }
                else
                {
                    if($file!="." && $file!="..")
                    {
                        echo $file."<br>";
                    }
                }
            }
            closedir($dh);
        }
    }
}
?>

<div class="page-index">
  <h2><?= Html::encode($this->title) ?></h2>
  <?php listDir($path)?>
</div>
