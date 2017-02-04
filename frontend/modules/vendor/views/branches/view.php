<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Branches */

$this->title = $model->branchName;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-view">

    <h3 class="page-header"><?= Html::encode($this->title) ?></h3>

    

    <div class="col-md-12">
        <div class="row">
        <div>
    
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
         
    <div class="col-sm-4 col-xs-6 tital " >Name:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->branchName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
           <div class="col-sm-4 col-xs-6 tital " >address1:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->address1; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          <div class="col-sm-4 col-xs-6 tital " >Address2:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->address2; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Country:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->countryName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >State:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->stateName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >City:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->cityName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Postal Code:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->postalCode; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >About Shop:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->aboutShop; ?></div>
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
