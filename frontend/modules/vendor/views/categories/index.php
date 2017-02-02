<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\vendor\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

     <h3 class="page-header"> Categories</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'catId',
            'name',
            //'description:ntext',
           // 'parentCategoryId',
            ['attribute'=>'status',
        		'label' => 'Status',
        		'value' => function ($data) {
        			return $data->status;
        		
        		},
        		'filter' => Html::activeDropDownList($searchModel, 'status', ['Active' => 'Active','In-active' => 'In-active'],['class'=>'form-control','prompt' => 'Status']),
        		],
            // 'vendorId',
            // 'createdDate',
            // 'updatedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
