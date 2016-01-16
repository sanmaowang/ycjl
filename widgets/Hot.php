<?php
/**
 * @copyright Copyright (c) 2015 Sanmao
 * @author Sanmao <wang@sanmao.me>
 * @link http://sanmao.me
 * @license http://opensource.org/licenses/MIT
 */
namespace app\widgets;
use app\models\Post;


class Hot extends \yii\bootstrap\Widget
{

    public function run()
    {
        $hot = Post::find()->where(['is_recommend'=>1])->orderBy(['create_date'=>SORT_DESC])->all();
        $relate = Post::find()->orderBy(['create_date'=>SORT_DESC])->all();
        return $this->render('hot', [
            'hot' => $hot,
            'relate' => $relate,
        ]);
        
    }
}