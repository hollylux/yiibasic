<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carts: Order checked out successfully';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'Image',
                'attribute' => 'images',
                'value' => function($model) {
                    //return $data->images;
                    return Html::img('@web/mstore/' . $model->images, ['alt' => $model->product_id, 'height' => '100']);
                },
                'format' => 'html'],
            //'product_id',
            //'amount',
            ['label' => 'Amount',
                'headerOptions' => ['style' => 'width:10%'],
                'format' => 'raw',
                'value' => function ($model) {
                    $tmpl = '<span>' . $model->amount . '</span>';
                    return $tmpl;
                }],
            'price',
            ['label' => 'Sub total',
                'value' => function($model) {
                    return $model->price * $model->amount;
                },],
            // 'user_id',
            // 'user_name',
            // 'created_at',
            // 'updated_at',
            // 'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?></div>
