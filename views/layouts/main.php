<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <script>
            var mbase = '<?= Yii::getAlias('@mstore') ?>/';
            var ajaxUploadUrl = '<?= Url::to(['ajax/upload']) ?>';
            var ajaxCartUrl = '<?= Url::to(['ajax/cart']) ?>';
            var ajaxCartCountUrl = '<?= Url::to(['ajax/countcart']) ?>';
        </script>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">

            <?php
            NavBar::begin([
                //'brandLabel' => '北美40号公路',
                'brandLabel' => '北美40' . Html::img('@web/images/I40_sm.png', ['width' => '30']),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => '全部宝贝', 'url' => ['/']],
                    ['label' => '关于', 'url' => ['/site/about']],
                   // ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ? (
                            ['label' => '登录', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            ),
                    '<li>
                        <a href="' . Url::to(['cart/index']) . '">
                         购物车 <span id="bl-cart-icon" class="glyphicon glyphicon-shopping-cart"></span> <span id="bl-cart-badge" class="badge"></span>
                        </a>
                    </li>',
                //['label' => 'Cart', 'url' => ['/cart/index']],
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">

                <p class="pull-left">&copy; 北美40 <?= date('Y') ?></p>
                <p class="pull-right">Supported by: 
                    <?= Html::img('@web/images/brand_costco.jpg', ['height' => '30']) ?>
                    <?= Html::img('@web/images/brand_target.jpg', ['height' => '30']) ?>
                    <?= Html::img('@web/images/brand_walmart.jpg', ['height' => '30']) ?>
                    <?= Html::img('@web/images/brand_aws.jpg', ['height' => '30']) ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
