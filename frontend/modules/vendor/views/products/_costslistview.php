<?php 
use yii\helpers\Html;
use backend\models\Countries;
?>

           <h5><?= Countries::getCountryName($model->country); ?></h5>
          <div class="col-sm-4 col-xs-6 tital " >Selling Price:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->cost; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Regular Price:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->regularPrice; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Currency:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->currency; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>

