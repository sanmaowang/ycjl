<?php
/**
 * @copyright Copyright (c) 2015 Sanmao
 * @author Sanmao <wang@sanmao.me>
 * @link http://sanmao.me
 * @license http://opensource.org/licenses/MIT
 */
namespace app\widgets;
use app\models\Page;
use app\models\Menu;


class Links extends \yii\bootstrap\Widget
{

    public function run()
    {
        $menu = Menu::find()->where(['position'=>'bottom'])->one();
        $p = explode(',',$menu->content);
        $model = Page::find()->where(['id'=>$p])->all();
        return $this->render('links', [
            'pages' => $model,
        ]);
        
    }
}