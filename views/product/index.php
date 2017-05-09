<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Add Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'tableOptions' => ['id' => 'prodTblId'],
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            //'images',
            //[ 'attribute' => 'images', 'headerOptions' => ['style' => 'width:10%'],],
            ['label' => 'Image',
                'value' => function($data) {
                    //return $data->images;
                    return Html::img('@web/mstore/' . $data->images, ['alt' => $data->name, 'height' => '100']);
                },
                'format' => 'html'],
            'name',
            'description',
            //'status',
            //'images',
            // 'my_price',
            'us_price',
            // 'us_url:url',
            'cn_price',
            // 'cn_url:url',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['style' => 'width:10%'],],
        ],
    ]);
    ?>
    <?php
    Pjax::end();
    //$this->registerJsFile('@web/js/product.js', ['position' => \yii\web\View::POS_END]);
    ?>
    <p>
        <?= Html::a('Add Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p></div>

