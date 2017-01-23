<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\VendorInfo */

$this->title = 'Create Vendor Info';
$this->params['breadcrumbs'][] = ['label' => 'Vendor Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
