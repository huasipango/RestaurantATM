<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/index/logo.png', ['alt'=>Yii::$app->name], array('height'=>'100', 'width'=>'100')),
        
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        // 'options' => ['style' => 'font-size:10px'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            
                
            ['label' => 'Sobre nosotros', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                
                ['label' => 'User Login', 'url' => ['#'], 'items' => [
                    ['label' => 'Login', 'url' => ['/site/login']],
                    ['label' => 'Sign up', 'url' => '/site/register'],
                ]]
            ) : (
                User::isUserAdmin(Yii::$app->user->identity->id) ?(
                    ['label' => 'Welcome '. Yii::$app->user->identity->username, 'items' => [
                    ['label' => 'Categorías', 'url' => ['/categoria/index']],
                    ['label' => 'Productos', 'url' => ['/producto/index']],
                    ['label' => 'Pedido', 'url' => ['/pedido/index']],
                    ['label' => 'Items Pedido', 'url' => ['/itempedido/index']],
                    ['label' => 'Clientes', 'url' => ['/cliente/index']],
                    ['label' => 'Facturas', 'url' => ['/factura/index']],
                    ['label' => 'Pagos', 'url' => ['/cobro/index']],

                    ['label' => 'Logout (' . \Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']]
                    ]
                ]
                ):(
                ['label' => 'Welcome '. Yii::$app->user->identity->username, 'items' => [
                    ['label' => 'Pedido', 'url' => ['/pedido/index']],
                    ['label' => 'Items Pedido', 'url' => ['/itempedido/index']],
                    ['label' => 'Logout (' . \Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']]
                    ]
                ]
                )                
            )

        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div class="main-content">
            <?= $content ?>    
        </div>
        
    </div>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
