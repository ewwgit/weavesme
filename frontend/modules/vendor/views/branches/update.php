<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Branches */

$this->title = 'Update Branches: ' . $model->branchName;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->branchId, 'url' => ['view', 'id' => $model->branchId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branches-update">

   <h3 class="page-header"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
