<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <div class="row">

        <?php $form = ActiveForm::begin(); ?>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
            <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'image_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'walmart_price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'walmart_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'tmall_price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'tmall_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'costco_price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'costco_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'target_price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'target_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'amazon_price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 form-group">
            <?= $form->field($model, 'amazon_url')->textInput(['maxlength' => true]) ?>
        </div>
        <?= $form->field($model, 'create_time')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'update_time')->hiddenInput()->label(false) ?>

        <div class="col-sm-6 form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
