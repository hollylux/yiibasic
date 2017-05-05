<?php
/* @var $this yii\web\View */

$this->title = '北美40 - 从此， 开启半个美式生活';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>北美40：从此， 开启半个美式生活</h1>
        <p class="lead">乐享美国高级连锁Costco, Target, Walmart, Amazon专供， 包邮包税</p>
    </div>
    <div class="body-content">
        <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="./mstore/<?= $product['images'] ?>" alt="<?= $product['description'] ?>">
                        <div class="caption">
                            <h5><?= $product['name'] ?></h5>
                            <p>¥ <?= $product['cn_price'] ?></p>
                            <p><a href="#" class="btn btn-danger" role="button">喜欢</a> <a href="#" class="btn btn-success" role="button">带走</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h2>商品</h2>
                <p><a class="btn btn-default" href="./index.php?r=product">商品列表 &raquo;</a></p>
            </div>
            <div class="col-md-3">
                <h2>订单</h2>
                <p><a class="btn btn-default" href="">订单查询 &raquo;</a></p>
            </div>
            <div class="col-md-3">
                <h2>活动</h2>
                <p><a class="btn btn-default" href=""> 数据统计 &raquo;</a></p>
            </div>
            <div class="col-md-3">
                <h2>统计</h2>
                <p><a class="btn btn-default" href=""> 数据统计 &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
