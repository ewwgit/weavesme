<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\vendor\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'productId',
            'productCode',
            'vendorId',
            'branchId',
            'productName',
            // 'categoryId',
            // 'description:ntext',
            // 'productStatus',
            // 'cashOnDeliveryStatus',
            // 'CashOnDeliveryPrice',
            // 'productColor:ntext',
            // 'sareeFabric',
            // 'sareeType',
            // 'sareeWork',
            // 'sareeLength',
            // 'blouseAvailable',
            // 'blouseColor:ntext',
            // 'blouseWork',
            // 'blouseFabric',
            // 'blouseSize',
            // 'pettiCoat',
            // 'occation:ntext',
            // 'WashCare',
            // 'createdBy',
            // 'updatedBy',
            // 'createdDate',
            // 'updatedDate',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
