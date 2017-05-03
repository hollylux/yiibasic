<?php

namespace app\controllers;

use Yii;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * AjaxController is responsible for handling AJAX calls.
 */
class AjaxController extends Controller {

    public function actionUpload() {
        //$model = new UploadForm();
        $imageFile = $_FILES['imageFile'];

        $data = '{"imgURI": ""}';

        if (Yii::$app->request->isAjax && isset($imageFile)) {
            //$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            //$model->imageFile = UploadedFile::getInstanceByName($_FILES['imageFile']['tmp_name']);
            //if ($model->upload()) {
            $tgtFileURI = \date('ymdHis') . $_FILES['imageFile']['name'];
            $tgtFile = Yii::getAlias('@webroot') .'/mstore/' .  $tgtFileURI;
            if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $tgtFile)) {
                //Yii::$app->response->format = Response::FORMAT_JSON;
                $data = '{"imgURI":"' . $tgtFileURI . '"}';
                return $data;
            }
        }
        return $data;
    }

}
