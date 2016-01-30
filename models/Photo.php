<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $parent_id
 * @property string $title
 * @property string $path
 * @property string $description
 * @property integer $is_recommend
 * @property integer $create_date
 * @property integer $update_date
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'parent_id', 'is_recommend', 'create_date', 'update_date'], 'integer'],
            [['description'], 'string'],
            [['title', 'path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', 'Page ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'title' => Yii::t('app', 'Title'),
            'path' => Yii::t('app', 'Path'),
            'description' => Yii::t('app', 'Description'),
            'is_recommend' => Yii::t('app', 'Is Recommend'),
            'create_date' => Yii::t('app', 'Create Date'),
            'update_date' => Yii::t('app', 'Update Date'),
        ];
    }
}
