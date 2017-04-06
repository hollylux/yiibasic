<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductHistory */

$this->title = 'Update Product History: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
