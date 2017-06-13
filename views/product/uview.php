<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            /*
            ['label' => '分类',
                'value' => function($data) {
                    return $data::CATEGORIES[$data->category];
                }
            ],*/
            // 'status',
            // 'images',
            ['label' => '',
                'value' => function($data) {
                    //return $data->images;
                    return Html::img('@web/mstore/' . $data->images, ['alt' => $data->name, 'height' => '300']) . Html::img('@web/images/wechatwj.jpg', ['alt' => '加文静购买', 'height' => '250']);
                },
                'format' => 'html'
            ],
            'my_price',
           
        ],
    ])
    ?>

</div>
