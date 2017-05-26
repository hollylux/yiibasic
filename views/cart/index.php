<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <?php $form = ActiveForm::begin(['action' => ['cart/save']]); ?>
    <p>
        <?= Html::submitButton('结算', ['class' => 'btn btn-primary']) ?>
    </p>
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
                    $tmpl = '<div class="input-group">
                                <a href="#" onclick="increaseAmt(this);"><span class="input-group-addon" >+</span></a>
                                <input type="text" name="amounts[]"class="form-control" aria-label="Amount" value="' . $model->amount . '">
                                <a href="#" onclick="decreaseAmt(this);" ><span class="input-group-addon">-</span></a>
                              </div>
                            <input type="hidden" name="ids[]" value="' . $model->id . '" />';
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
<p>
    <?= Html::submitButton('结算', ['class' => 'btn btn-primary']) ?>
</p>
<?php ActiveForm::end(); ?>
