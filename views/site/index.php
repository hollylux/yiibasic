<?php
/* @var $this yii\web\View */

$this->title = '北美40 - 从此， 开启半个美式生活';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>北美40：从此， 开启半个美式生活</h1>
        <p class="lead">乐享美国本土高级连锁
            <img height="30" src="/images/brand_costco.jpg"/>
            <img height="40" src="/images/brand_target.jpg"/>
            <img height="30" src="/images/brand_walmart.jpg"/>
            <img height="30" src="/images/brand_amazon.jpg"/> 专供， 包邮包税</p>
    </div>
    <div class="body-content">
        <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="./mstore/<?= $product['images'] ?>" alt="<?= $product['description'] ?>">
                        <hr/>
                        <div class="caption">
                            <h5><?= $product['name'] ?></h5>
                            <p>¥ <strong class="price"><?= $product['my_price'] ?></strong> ¥<del class="small"> <?= $product['cn_price'] ?></del>  </p>
                            <?php if (!Yii::$app->user->isGuest) { ?>
                                <p><a href="#" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-heart"></span></a> <a href="javascript: add2Cart(<?= $product['id'] ?>)" class="btn btn-success" role="button">带走</a></p>
                                    <?php } ?>
                                <p>宝贝ID： <?=$product['id']?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</div>
</div>
