<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = '北美40 - 从此， 开启半个美式生活';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>北美40：从此， 开启半个美式生活</h1>
        <p class="lead">乐享美国本土
            <img height="30" src="/images/brand_costco.jpg"/>
            <img height="40" src="/images/brand_target.jpg"/>
            <img height="30" src="/images/brand_walmart.jpg"/>
            <img height="30" src="/images/brand_amazon.jpg"/> 连锁专供， 包邮包税</p>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-sm-8 col-md-8">
            <strong>分类</strong>： 
            <a class="btn btn-default" href="/" role="button">全部</a>
            <a class="btn btn-success" href="<?= Url::to(['site/category', 'cId' => 1]) ?>" role="button">宝宝食品</a>
            <a class="btn btn-warning" href="<?= Url::to(['site/category', 'cId' => 2]) ?>" role="button">宝宝防护</a>
            <a class="btn btn-danger" href="<?= Url::to(['site/category', 'cId' => 10]) ?>" role="button">辣妈Hot</a>
            <a class="btn btn-info" href="<?= Url::to(['site/category', 'cId' => 20]) ?>" role="button">酷爹Cool</a>
            <a class="btn btn-primary" href="<?= Url::to(['site/category', 'cId' => 30]) ?>" role="button">轻奢</a>
            <!--
            <a class="btn btn-primary" href="<?= Url::to(['site/category', 'cId' => 50]) ?>" role="button">小惊喜 <span class="glyphicon glyphicon-piggy-bank"></span></a>
            -->
            </div>
            <div class="col-sm-4 col-md-4">
            <strong>排序</strong>： 
            <a class="btn btn-default" href="/" role="button">最近更新</a>
            <!--
            <a class="btn btn-danger" href="/" role="button">最新<span class="glyphicon glyphicon-refresh"></span></a>
            -->
            <a class="btn btn-danger" href="<?= Url::to(['site/orderby', 'oId' => 1]) ?>" role="button">热卖 <span class="glyphicon glyphicon-fire"></span></a>
            <a class="btn btn-success" href="<?= Url::to(['site/orderby', 'oId' => 2]) ?>" role="button">价格<span class="glyphicon glyphicon-sort-by-order"></span></a>
            </div>
        </div>
        <hr/>
        <div class="row">
            <?php
            if (count($products) > 0) {
                foreach ($products as $product) {
                    ?>
                    <div class="col-sm-4 col-md-3">
                        <div class="thumbnail">
                            <img src="/mstore/<?= $product['images'] ?>" alt="<?= $product['description'] ?>">
                           
                            <div class="caption">
                                <h5><?= $product['name'] ?></h5>
                                <p>¥ <strong class="price"><?= $product['my_price'] ?></strong> ¥<del class="small"> <?= $product['cn_price'] ?></del>  (<span class="small"><?= $product['soldnum']?> 已售</span>)</p>
                                <?php if (!Yii::$app->user->isGuest) { ?>
                                <p><a href="javascript: ajaxProxy({'xId':2,'pId': <?= $product['id'] ?>});" id="bl-btn-fav-<?= $product['id'] ?>" class="btn btn-danger" role="button"><span id="bl-num-fav-<?= $product['id'] ?>"><?= $product['favnum']?></span><span class="glyphicon glyphicon-heart-empty"></span>
                                    </a> <a href="javascript: ajaxProxy({'xId':3,'pId': <?= $product['id'] ?>});" class="btn btn-success" role="button">带走</a></p>
                                <?php } ?>
                                <p>宝贝ID： <?= $product['id'] ?></p>
                            </div>
                        </div>
                    </div>
                 <?php
                } // end for
            } else {
                ?>
                宝贝分类上架中.. 敬请期待 :)
        <?php } // end if?>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-8 col-md-8">
            <strong>分类</strong>： 
            <a class="btn btn-default" href="/" role="button">全部</a>
            <a class="btn btn-success" href="<?= Url::to(['site/category', 'cId' => 1]) ?>" role="button">宝宝食品</a>
            <a class="btn btn-warning" href="<?= Url::to(['site/category', 'cId' => 2]) ?>" role="button">宝宝防护</a>
            <a class="btn btn-danger" href="<?= Url::to(['site/category', 'cId' => 10]) ?>" role="button">辣妈Hot</a>
            <a class="btn btn-info" href="<?= Url::to(['site/category', 'cId' => 20]) ?>" role="button">酷爹Cool</a>
            <a class="btn btn-primary" href="<?= Url::to(['site/category', 'cId' => 30]) ?>" role="button">轻奢</a>
            <!--
            <a class="btn btn-primary" href="<?= Url::to(['site/category', 'cId' => 50]) ?>" role="button">小惊喜 <span class="glyphicon glyphicon-piggy-bank"></span></a>
            -->
            </div>
            <div class="col-sm-4 col-md-4">
            <strong>排序</strong>： 
            <a class="btn btn-default" href="/" role="button">最近更新</a>
            <!--
            <a class="btn btn-danger" href="/" role="button">最新<span class="glyphicon glyphicon-refresh"></span></a>
            -->
            <a class="btn btn-danger" href="<?= Url::to(['site/orderby', 'oId' => 1]) ?>" role="button">热卖 <span class="glyphicon glyphicon-fire"></span></a>
            <a class="btn btn-success" href="<?= Url::to(['site/orderby', 'oId' => 2]) ?>" role="button">价格<span class="glyphicon glyphicon-sort-by-order"></span></a>
            </div>
        </div>
    </div>

</div>
</div>
