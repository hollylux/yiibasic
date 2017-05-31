<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
        <?= Html::a('Add Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            ['label'=>'Category',
                'value'=> function($data){
                    return $data::CATEGORIES[$data->category];
                }
                
            ],
            // 'status',
            // 'images',
            ['label' => 'Image',
                'value' => function($data) {
                    //return $data->images;
                    return Html::img('@web/mstore/' . $data->images, ['alt' => $data->name, 'height' => '100']);
                },
                'format' => 'html'
            ],
            'my_price',
            'us_price',
            'us_url:url',
            'cn_price',
            'cn_url:url',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
