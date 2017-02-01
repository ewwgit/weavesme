<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\VendorInfo */

$this->title = 'Vendor Profile View';
$this->params['breadcrumbs'][] = ['label' => 'Vendor Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h3 class="page-header"> Profile</h3>
<div class="row"> 
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="text-center"> <img src="<?php
							if($model->profileImage){
								echo isset( $model->profileImage)? Url::base().$model->profileImage : '' ;
							
							}else {
									 echo Url::base()."/frontend/web/images/logo.png" ;
								      }
								?>" class="avatar img-circle img-thumbnail" alt="avatar"> </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
          <div class="col-sm-3 col-xs-6 tital " >User Name:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->userName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          <div class="col-sm-3 col-xs-6 tital " >Email:</div>
          <div class="col-sm-7 col-xs-6"> <?= $model->email; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          <div class="col-sm-3 col-xs-6 tital " >Company Name:</div>
          <div class="col-sm-7 col-xs-6"> <?= $model->companyName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          <div class="col-sm-3 col-xs-6 tital " >Registration Number:</div>
          <div class="col-sm-7 col-xs-6"><?= $model->regNumber; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          <div class="col-sm-3 col-xs-6 tital " >Last Name:</div>
          <div class="col-sm-7 col-xs-6"><?= $model->lastName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-3 col-xs-6 tital " >Telephone:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->telephone; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-3 col-xs-6 tital " >Mobile:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->mobile; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-3 col-xs-6 tital " >Fax:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->fax; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-3 col-xs-6 tital " >City:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->city; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-3 col-xs-6 tital " >State:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->state; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-3 col-xs-6 tital " >Country:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->country; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-3 col-xs-6 tital " >Address:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->address; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-3 col-xs-6 tital " >Postal Code:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->postalCode; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          
          <div class="col-md-5 form-group text-right">
         
             <a href="<?= Yii::$app->urlManager->createUrl(['vendor/vendor/update']);?>" class="btn btn-primary profileedit" >
              Edit
              </a> 
          </div>
        </div>
      </div>
      
