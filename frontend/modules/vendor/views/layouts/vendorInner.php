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

<div class="header_top">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="logo"><a href="#"><img src="images/logo.png" class="img-responsive" > </a> </div>
      </div>
      <div class="col-md-6 col-sm-6 ">
        <nav id='cssmenu'>
         
          <div class="button"></div>
          <ul>
            <!--<li class='active'><a href='#'>Profile</a> -->
              
              <!--<ul>
            <li><a href='#'>Profile View</a></li>
            <li><a href='#'>Profile Edit</a></li>
         </ul>--> 
            </li>
            <li><a href='<?= Yii::$app->urlManager->createUrl(['vendor/categories/index']);?>'>Categories</a></li>
            <li><a href='<?= Yii::$app->urlManager->createUrl(['vendor/branches/index']);?>'>Barnches</a> 
              <!--<ul>
      <li><a href='#'>Product 1</a>
         <ul>
            <li><a href='#'>Sub Product</a></li>
            <li><a href='#'>Sub Product</a></li>
         </ul>
      </li>
      <li><a href='#'>Product 2</a>
         <ul>
            <li><a href='#'>Sub Product</a></li>
            <li><a href='#'>Sub Product</a></li>
         </ul>
      </li>
   </ul>--> 
            </li>
            <li><a href='<?= Yii::$app->urlManager->createUrl(['vendor/products/index']);?>'>Products</a></li>
          </ul>
        </nav>
      </div>
      <?php  if ( (Yii::$app->vendoruser->vendorroleId ==2)) {?>
      <div class="create_btn  pull-right" >
        <ul class="icon4 sub-icon2 ">
          <li><a class="active-icon2 " href="#"><i class="fa fa-user"></i> <?=  Yii::$app->vendoruser->vendorusername; ?> <i class="fa fa-caret-down"></i> </a>
            <ul class="sub-icon2 list">
              <li><a href="#" title=""> Profile</a></li>
              <li><a href="<?= Yii::$app->urlManager->createUrl(['vendor/vendor/logout']);?>">Signout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="clearfix"> </div>
  <!--header top end--------> 
  
  <!--menus bar start-------->
  
  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="container" style="min-height:610px;">
<div class="row">
    <div class="container" >
        <?php /* echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */ ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
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
