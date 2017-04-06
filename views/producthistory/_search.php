<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'create_time') ?>

    <?= $form->field($model, 'update_time') ?>

    <?= $form->field($model, 'walmart_price') ?>

    <?php // echo $form->field($model, 'walmart_url') ?>

    <?php // echo $form->field($model, 'tmall_price') ?>

    <?php // echo $form->field($model, 'tmall_url') ?>

    <?php // echo $form->field($model, 'amazon_price') ?>

    <?php // echo $form->field($model, 'amazon_url') ?>

    <?php // echo $form->field($model, 'target_price') ?>

    <?php // echo $form->field($model, 'target_url') ?>

    <?php // echo $form->field($model, 'costco_price') ?>

    <?php // echo $form->field($model, 'costco_url') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
