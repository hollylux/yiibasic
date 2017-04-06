<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'walmart_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'walmart_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmall_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmall_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amazon_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amazon_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costco_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costco_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
