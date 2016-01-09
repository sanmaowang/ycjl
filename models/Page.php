<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\models\Post;
use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $name
 * @property string $english_name
 * @property string $slug
 * @property string $url
 * @property string $excerpt
 * @property string $content
 * @property integer $type
 * @property integer $status
 * @property integer $display_order
 * @property string $template
 * @property integer $create_date
 * @property integer $update_date
 */
class Page extends \yii\db\ActiveRecord
{
    const TYPE_PAGE = 0;
    const TYPE_LINK = 1;
    const TYPE_SITELINK = 2;
    const TYPE_NEWS = 3;


    const STATUS_SHOW = 0;
    const STATUS_HIDE = 1;

    public $leaf;
    public $sub;


    public function getTypeLabel()
    {
        $types = ['页面','外部链接','内部链接','新闻频道'];
        return $types[$this->type];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'user_id', 'type', 'status', 'display_order', 'create_date', 'update_date'], 'integer'],
            [['excerpt', 'content','english_name','template'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['slug'], 'string', 'max' => 64],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', '上级栏目'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', '名称'),
            'english_name' => Yii::t('app', '英文名称'),
            'slug' => Yii::t('app', 'Seo简称'),
            'url' => Yii::t('app', '链接地址'),
            'excerpt' => Yii::t('app', '摘要'),
            'content' => Yii::t('app', '内容'),
            'type' => Yii::t('app', '类型'),
            'status' => Yii::t('app', '状态'),
            'template' => Yii::t('app', '模板'),
            'display_order' => Yii::t('app', '显示顺序'),
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


    public function getPosts()
    {
        return $this->hasMany( Post::className(), ['page_id' => 'id']);
    }

}
