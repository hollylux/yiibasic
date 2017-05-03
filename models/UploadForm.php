<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /*
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg'],
        ];
    }*/
    
    
    public function upload()
    {
        //if ($this->validate()) {
            Yii::trace('Validated..');
            $curTime = \date('ymdHis');
            $this->imageFile->saveAs(Yii::getAlias('@webroot') . '/mstore/' . $this->imageFile->baseName . $curTime . '.' . $this->imageFile->extension);
            return true;
        //} else {
           // Yii::trace('Not validated..');
            //return false;
        //}
    }
}