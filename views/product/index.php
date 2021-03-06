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

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <p>
        <?= Html::a('添加商品', ['create'], ['class' => 'btn btn-success']) ?>
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
            ['label' => '图片',
                'attribute' => 'images',
                'value' => function($model) {
                    //return $data->images;
                    return Html::img('@web/mstore/' . $model->images, ['alt' => $model->name, 'height' => '100']);
                },
                'format' => 'html'],
            //'name',
            ['label' => '名称',
                'attribute' => 'name',
                'value'=> function($model){
                    return Html::a($model->name, ['product/view','id'=>$model->id]);
                },
                'format' =>'html',
            ],
            'description',
            //'status',
            //'images',
            'my_price',
            // 'us_url:url',
            'cn_price',
            'us_cost',
            'us_price',
            ['label' => '类别(ID)',
                'attribute' => 'category',
                'value' => function($model) {
                    return $model::CATEGORIES[$model->category] . '(' . $model->category . ')';
                }
            ],
            // 'category',
            // 'cn_url:url',
            // 'created_at',
            'updated_at',
            ['class' => 'yii\grid\ActionColumn', 'header' => 'Actions', 'headerOptions' => ['style' => 'width:6%'],],
        ],
    ]);
    ?>
    <?php
    Pjax::end();
    //$this->registerJsFile('@web/js/product.js', ['position' => \yii\web\View::POS_END]);
    ?>
    <p>
        <?= Html::a('添加商品', ['create'], ['class' => 'btn btn-success']) ?>
    </p></div>

