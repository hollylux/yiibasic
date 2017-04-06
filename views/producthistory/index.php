<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'create_time',
            'update_time',
            'walmart_price',
            // 'walmart_url:url',
            // 'tmall_price',
            // 'tmall_url:url',
            // 'amazon_price',
            // 'amazon_url:url',
            // 'target_price',
            // 'target_url:url',
            // 'costco_price',
            // 'costco_url:url',
            // 'price',
            // 'status',
            // 'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
