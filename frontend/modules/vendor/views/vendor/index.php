<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\vendor\models\VendorInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendor Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vendor Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vendorInfoId',
            'vendorId',
            'firstName',
            'lastName',
            'telephone',
            // 'mobile',
            // 'fax',
            // 'createdBy',
            // 'updatedBy',
            // 'createdDate',
            // 'updatedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
