<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Categories */

$this->title = 'Update Categories: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->catId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categories-update">

    <h3 class="page-header"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
