<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\models\Page;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $user_id
 * @property integer $is_recommend
 * @property integer $is_headline
 * @property string $name
 * @property string $subtitle
 * @property string $content
 * @property string $source
 * @property integer $create_date
 * @property integer $update_date
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'user_id', 'is_recommend','is_headline'], 'integer'],
            [['name','subtitle', 'content'], 'string'],
            [['create_date','subtitle', 'update_date','source'], 'safe']
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
            'user_id' => Yii::t('app', 'User ID'),
            'is_recommend' => Yii::t('app', '热门推荐内容'),
            'is_headline' => Yii::t('app', '头条内容'),
            'name' => Yii::t('app', '标题'),
            'subtitle' => Yii::t('app', '副标题'),
            'content' => Yii::t('app', '内容'),
            'source' => Yii::t('app', '来源'),
            'create_date' => Yii::t('app', '创建时间'),
            'update_date' => Yii::t('app', '更新时间'),
        ];
    }

    private function cut_str($sourcestr,$cutlength)
    {
       $returnstr='';
       $i=0;
       $n=0;
       $str_length=strlen($sourcestr);//字符串的字节数
       while (($n<$cutlength) and ($i<=$str_length)){
          $temp_str=substr($sourcestr,$i,1);
          $ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
          if ($ascnum>=224)    //如果ASCII位高与224，
          {
             $returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符         
             $i=$i+3;            //实际Byte计为3
             $n++;            //字串长度计1
          }
           elseif ($ascnum>=192) //如果ASCII位高与192，
          {
             $returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
             $i=$i+2;            //实际Byte计为2
             $n++;            //字串长度计1
          }
           elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
          {
             $returnstr=$returnstr.substr($sourcestr,$i,1);
             $i=$i+1;            //实际的Byte数仍计1个
             $n++;            //但考虑整体美观，大写字母计成一个高位字符
          }else                //其他情况下，包括小写字母和半角标点符号，
          {
             $returnstr=$returnstr.substr($sourcestr,$i,1);
             $i=$i+1;            //实际的Byte数计1个
             $n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽...
          }
        }
              if ($str_length>$cutlength){
              $returnstr = $returnstr . "...";//超过长度时在尾处加上省略号
          }
         return $returnstr;
    } 


    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    public function getThumb()
    {
      preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$this->content,$match);
      return $match?$match[1]:null;
    }

    public function getExcerpt()
    {
        $content =strip_tags($this->content);
        $content = str_replace("&nbsp;","",$content);
        return $this->cut_str(trim($content),150);
    }

    public function getShortExcerpt()
    {
        $content =strip_tags($this->content);
        $content = str_replace("&nbsp;","",$content);
        return $this->cut_str(trim($content),70);
    }
    
    public function getShortIntro()
    {
        $content =strip_tags($this->content);
        $content = str_replace("&nbsp;","",$content);
        return $this->cut_str(trim($content),36);
    }
}
