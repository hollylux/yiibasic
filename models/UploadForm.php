<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    
    public function upload()
    {
        if ($this->validate()) {
            $curTime = \date('ymdHis');
            $this->imageFile->saveAs(\Yii::getAlias('@webroot') . '/mstore/' . $this->imageFile->baseName . $curTime . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}