<?php

use yii\helpers\Html;
use frontend\modules\vendor\models\Categories;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Categories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-view">

    <h3 class="page-header"><?= Html::encode($this->title) ?></h3>

    
    
    
    
    <div class="col-md-12">
        <div class="row">
        <div>
    
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
         
    <div class="col-sm-4 col-xs-6 tital " >Name:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->name; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          <?php if( $model->parentCategoryId != 0){?>
          
          <div class="col-sm-4 col-xs-6 tital " >Parent Category:</div>
          <div class="col-sm-7 col-xs-6 "><?= Categories::getCategoryName($model->parentCategoryId); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          <?php } ?>
          
           <div class="col-sm-4 col-xs-6 tital " >description:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->description; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Status:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->status; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
         <div class="col-sm-4 col-xs-6 tital " >Created Date:</div>
          <div class="col-sm-7 col-xs-6 "><?= date('d-M-Y H:i:s',strtotime($model->createdDate)); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Updated Date:</div>
          <div class="col-sm-7 col-xs-6 "><?= date('d-M-Y H:i:s',strtotime($model->updatedDate)); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
    </div>
    </div>
    </div>
    </div>

</div>
