<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'product_id')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'amount')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'user_id')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'created_at')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'updated_at')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'status')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'shiped_at')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'delivered_at')->textInput() ?>
    </div>
    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'tracking_number')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-12 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
