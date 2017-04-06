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
            $curTime = \date('YmdHis');
            $this->imageFile->saveAs('../imgstore/' . $curTime . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}