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
            ['label' => '分类',
                'value' => function($data) {
                    return $data::CATEGORIES[$data->category];
                }
            ],
            // 'status',
            // 'images',
            ['label' => '图片',
                'value' => function($data) {
                    //return $data->images;
                    return Html::img('@web/mstore/' . $data->images, ['alt' => $data->name, 'height' => '100']);
                },
                'format' => 'html'
            ],
            'my_price',
            ['label'=>'扫码联系客服购买',
                'value' => '<img src="/images/brand_costco.jpg"/>',
                'format'=>'html',
            ],
        ],
    ])
    ?>

</div>
