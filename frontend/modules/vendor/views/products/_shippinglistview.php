<?php 
use yii\helpers\Html;
use backend\models\Countries;
?>

           <h5><?= Countries::getCountryName($model->shipingCountry); ?></h5>
          <div class="col-sm-4 col-xs-6 tital " >Shipping Price:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->shipingCost; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          
          <div class="col-sm-4 col-xs-6 tital " >Currency:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->shipingCurrency; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>

