<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\vendor\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="branches-index">

    <h3 class="page-header"> Branches</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'branchId',
            //'vendorId',
            'branchName',
        	'cityName',
        	'stateName',
        	'countryName',
        	//'postalCode',
            'address1:ntext',
        	['attribute'=>'status',
        		'label' => 'Status',
        		'value' => function ($data) {
        			return $data->status;
        		
        		},
        		'filter' => Html::activeDropDownList($searchModel, 'status', ['Active' => 'Active','In-active' => 'In-active'],['class'=>'form-control','prompt' => 'Status']),
        		],
            //'address2:ntext',
            // 'city',
            // 'state',
            // 'country',
            // 'postalCode',
            // 'aboutShop:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
