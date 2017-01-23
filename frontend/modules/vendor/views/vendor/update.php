<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\VendorInfo */

$this->title = 'Update Vendor Info: ' . $model->vendorInfoId;
$this->params['breadcrumbs'][] = ['label' => 'Vendor Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vendorInfoId, 'url' => ['view', 'id' => $model->vendorInfoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendor-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
