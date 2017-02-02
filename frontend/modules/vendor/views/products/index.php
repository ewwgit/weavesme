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

   <h3 class="page-header"> Proudcts </h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'productId',
           // 'productCode',
            //'vendorId',
            
            'productName',
            // 'categoryId',
            // 'description:ntext',
        		[
        		'attribute' => 'categoryId',
        		'label' => 'Category',
        		'value' => 'category.name',
        		 
        		],
            
        	[
        		'attribute' => 'branchId',
        		'label' => 'Branch',
        		'value' => 'branch.branchName',
        		 
        		],
        	
        		['attribute'=>'productStatus',
        		'label' => 'Product Status',
        		'value' => function ($data) {
        		return $data->productStatus;
        		
        		},
        		'filter' => Html::activeDropDownList($searchModel, 'productStatus', ['In Stock' => 'In Stock','Out Of Stock' => 'Out Of Stock'],['class'=>'form-control','prompt' => 'Status']),
        		],
        	
        		['attribute'=>'status',
        		'label' => 'Status',
        		'value' => function ($data) {
        			return $data->status;
        		
        		},
        		'filter' => Html::activeDropDownList($searchModel, 'status', ['Active' => 'Active','In-active' => 'In-active'],['class'=>'form-control','prompt' => 'Status']),
        		],
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
