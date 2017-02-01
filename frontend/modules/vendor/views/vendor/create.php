<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\VendorInfo */

$this->title = 'Profile ';
$this->params['breadcrumbs'][] = ['label' => 'Vendor Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container" >
      <h3 class="page-header"> Profile</h3>
     
       <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
      </div>
   
