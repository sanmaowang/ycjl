<?php 

namespace app\models;
use yii;
use yii\base\Model;
use yii\web\UploadedFile;
setlocale(LC_ALL, 'zh_CN.GBK'); 
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    private function get_basename($filename){    
         return preg_replace('/^.+[\\\\\\/]/', '', $filename);    
    } 
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $date = date("Ymd",time());
                $path = Yii::$app->basePath.'/web/uploads/picnews/'.$date.'/';
                if ( !file_exists($path ))
                {
                    mkdir($path );
                    chmod($path, '777');
                }
                $file->saveAs($path . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
?>