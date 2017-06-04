<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id'=>'bl-prod-form']]); ?>
    <div class="col-sm-12 form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div class="col-sm-4 form-group">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4 form-group">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4 form-group">
        <label for="product-category" class="control-label">分类</label>
        <?= Html::activeDropDownList($model, 'category', $model::CATEGORIES, ['class' => 'form-control']) ?>
    </div>
    <div class="col-sm-12 form-group">
        <label>上传图片 (最多一个)</label>
        <hr/>
        <div id="bl-prod-img">
            <?= Html::img('@web/mstore/' . $model->images, ['alt' => $model->name, 'height' => '100']) ?>
        </div>
    </div>
    <div class="col-sm-4 form-group">
        <span id="bl-note-loading" style="display: none;"><?= Html::img('@web/images/loading.gif')?></span>
        <input type="file" id="imageFile" name="imageFile" />
    </div>
    <div class="col-sm-2 form-group">
        <button type="button" id="bl-btn-upload" class="btn btn-success form-control" onclick="uploadImg();">
            上传图片</button>
    </div>

    <div class="col-sm-2 form-group">
        <button type="button" id="bl-btn-delete" class="btn btn-warning form-control" onclick="deleteImg();">删除图片</button>
    </div>
    <div class="col-sm-4 form-group">
       <br/><br/>
    </div>
    <div class="col-sm-12 form-group">
       <hr/>
    </div>

    <div class="col-sm-2 form-group">
        
        <?= $form->field($model, 'my_price')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2 form-group">
        <?= $form->field($model, 'cn_price')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2 form-group">
        <?= $form->field($model, 'us_price')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2 form-group">
        <?= $form->field($model, 'us_cost')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2 form-group">
        <?= $form->field($model, 'us_url')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2 form-group">
        <?= $form->field($model, 'cn_url')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-12 form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="col-sm-6 form-group">
        <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'images')->hiddenInput()->label(false) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
