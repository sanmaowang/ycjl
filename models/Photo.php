<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
    public $file;
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
            [['title','path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', '所属分类'),
            'parent_id' => Yii::t('app', '上级ID'),
            'title' => Yii::t('app', '标题'),
            'file' => Yii::t('app', '图片'),
            'path' => Yii::t('app', '图片'),
            'description' => Yii::t('app', '描述'),
            'is_recommend' => Yii::t('app', 'Is Recommend'),
            'create_date' => Yii::t('app', 'Create Date'),
            'update_date' => Yii::t('app', 'Update Date'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_date', 'update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_date'],
                ],
//                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
