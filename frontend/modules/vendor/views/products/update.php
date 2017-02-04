<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Products */

$this->title = 'Update Products: ' . $model->productName;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productId, 'url' => ['view', 'id' => $model->productId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

   <h3 class="page-header"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
