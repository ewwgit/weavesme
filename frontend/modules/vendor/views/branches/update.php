<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Branches */

$this->title = 'Update Branches: ' . $model->branchId;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->branchId, 'url' => ['view', 'id' => $model->branchId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
