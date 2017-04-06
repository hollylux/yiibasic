<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MyUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create My User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'pwd',
            'wechat',
            'qq',
            // 'cellphone',
            // 'address',
            // 'create_time',
            // 'update_time',
            // 'status',
            // 'email:email',
            // 'ip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
