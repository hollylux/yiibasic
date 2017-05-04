<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-12 form-group">
        <label>Images</label>
        <hr/>
        <div id="bl-prod-img"></div>
        <hr/>
        <input type="file" id="imageFile" name="imageFile"/>
    </div>

    <div class="col-sm-12 form-group">
        <button type="button" id="bl-btn-upload" class="btn btn-success" onclick="uploadImg();">Upload</button>
        <button type="button" id="bl-btn-delete" class="btn btn-warning" onclick="deleteImg();">Delete</button>
        <hr/>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'my_price')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'us_price')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'us_url')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'cn_price')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'cn_url')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-12 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'images')->hiddenInput()->label(false) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
