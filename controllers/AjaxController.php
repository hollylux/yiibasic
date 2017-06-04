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

    const AJAX_ACTIONS = ['countCart' => '1', 'likeIt' => '2', 'add2Cart' => '3'];

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
    private function add2Cart() {
        $model = new Cart();

        if (Yii::$app->request->isAjax && $this->populateCart($model) && $model->save()) {
            return $this->countCart();
        }
    }

    private function populateCart($model) {
        $pId = Yii::$app->request->post('params')['pId'];
        $prod = Product::findOne($pId);

        //$data = $prod->attributes;
        //$model->setAttributes($data);
        $model->product_id = $pId;
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

    /*
      public function actionCountcart() {
      if (Yii::$app->request->isAjax) {
      $uid=0; // 0 - admin
      return $this->aCountCart($uid);
      }
      } */

    private function countCart() {
        $uid = 0; // Yii::$app->request->post('uid');
        $sql = 'SELECT count(*) FROM cart WHERE status=1 and user_id=:uid';
        $count = Cart::findBySql($sql, [':uid' => $uid])->scalar();
        return $count;
    }

    private function updateLikeCounter($pId) {
        /* DAO mode
          Yii::$app->db->createCommand('UPDATE product SET favnum=favnum + 1 where id=:pId')
          ->bindValue(':pId', $pId)
          ->execute();
         */
        $product = Product::findOne($pId);
        $product->updateCounters(['favnum' => 1]);
        Yii::trace('like updated');
    }

    private function likeIt($pId) {
        $retVal = 0;
        $session = Yii::$app->session;
        //Yii::trace(Yii::$app->session);
        $userIDPidIp = Yii::$app->user->id . $pId . Yii::$app->request->getUserIP();
        Yii::trace('@#userIDPidIp: ' . $userIDPidIp);

        if (!$session->isActive) {
            $session->open();
            $session['userIDPidIp'] = $userIDPidIp;
            Yii::trace('@# open new session: ' . $session['userIDPidIp']);
            $this->updateLikeCounter($pId);
            $retVal = 1;
        }

        if ($session['userIDPidIp'] != $userIDPidIp) {
            // Not updated like counter before
            Yii::trace('@# set userIDPidIp: ' . $session['userIDPidIp']);
            $session['userIDPidIp'] = $userIDPidIp;
            $this->updateLikeCounter($pId);
            $retVal = 1;
        }

        return $retVal;
    }

    public function actionProxy() {
        $retVal = 0;
        if (!Yii::$app->request->isAjax) {
            return $retVal;
        }

        $params = Yii::$app->request->post('params');
        Yii::trace($params);
        switch ($params['xId']) {
            case AjaxController::AJAX_ACTIONS['countCart']: $retVal = $this->countCart();
                break;
            case AjaxController::AJAX_ACTIONS['likeIt']: $retVal = $this->likeIt($params['pId']);
                break;
            case AjaxController::AJAX_ACTIONS['add2Cart']: $retVal = $this->add2Cart($params['pId']);
                break;
            default: Yii::trace('switch default');
                break;
        }

        return $retVal;
    }

}
