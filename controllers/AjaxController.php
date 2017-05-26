<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Cart;
use app\models\Product;

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
            $tgtFile = Yii::getAlias('@webroot') . '/mstore/' . $tgtFileURI;
            if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $tgtFile)) {
//Yii::$app->response->format = Response::FORMAT_JSON;
                $data = '{"imgURI":"' . $tgtFileURI . '"}';
                return $data;
            }
        }
        return $data;
    }

    /**
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCart() {
        $model = new Cart();

        if (Yii::$app->request->isAjax && $this->loadCart($model) && $model->save()) {
            //Yii::trace($model);
            return $this->countCart(0); // 0 - admin 
        }
    }

    private function loadCart($model) {
        $req = Yii::$app->request;
        $pid = $req->post('pid');
        Yii::trace($pid);
        $prod = Product::findOne($pid);

//$data = $prod->attributes;
//$model->setAttributes($data);
        $model->product_id = $pid;
        $model->amount = 1;
        $model->price = $prod->cn_price;
        $model->user_id = 0;
        $model->user_name = 'admin';
        $model->status = 1;
        $model->images = $prod->images;
        $cur = date('Y-m-d H:i:s');
        $model->updated_at = $cur;
        $model->created_at = $cur;

        return true;
    }

    private function countCart($uid) {
        $sql = 'SELECT count(*) FROM cart WHERE status=1 and user_id=:uid';
        $count = Cart::findBySql($sql, [':uid' => $uid])->scalar();
        return $count;
    }

    public function actionCountcart() {
        if (Yii::$app->request->isAjax) {
            $uid = Yii::$app->request->post('uid');
            return $this->countCart($uid);
        }
    }

}
