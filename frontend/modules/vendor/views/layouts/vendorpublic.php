<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

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
</head>
<body>
<?php $this->beginBody() ?>

<div id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-xs-8">
        <div class="logo"><a href="<?php echo Url::base();?>/frontend/web/images/logo.png"><img src="images/logo.png"></a></div>
      </div>
      <div class="col-md-2 col-xs-4 pull-right">
      <div class="register_button"> <a href="<?= Yii::$app->urlManager->createUrl(['vendor/vendor/login']);?>">Login</a> </div>
        <div class="register_button"> <a href="<?= Yii::$app->urlManager->createUrl(['vendor/vendor/signup']);?>">Signup</a> </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

    <div class="container">
        <?php /* echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */ ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<div class="clearfix"></div>

<div id="footer">
<div class="container">
<div class="footer">
<p> Copyright &copy; weaves 2017. All right reserved. </p>
</div>

</div>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
