<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Products */

$this->title = $model->productId;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->productId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->productId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'productId',
            'productCode',
            'vendorId',
            'branchId',
            'productName',
            'categoryId',
            'description:ntext',
            'productStatus',
            'cashOnDeliveryStatus',
            'CashOnDeliveryPrice',
            'productColor:ntext',
            'sareeFabric',
            'sareeType',
            'sareeWork',
            'sareeLength',
            'blouseAvailable',
            'blouseColor:ntext',
            'blouseWork',
            'blouseFabric',
            'blouseSize',
            'pettiCoat',
            'occation:ntext',
            'WashCare',
            'createdBy',
            'updatedBy',
            'createdDate',
            'updatedDate',
            'status',
        ],
    ]) ?>
    
    
    <div>
    <h2>Product Images</h2>
    <?php 
echo ListView::widget( [
		'dataProvider' => $dataProvider,
		'itemView' => '_gallerylistview',
] );
?>   
    </div>

</div>

<?php 

$this->registerJs("
		
		$('.remove').on('click',  function(){
		var galleryid = $(this).attr('galleryid');
		var answer = confirm ('Are you sure you want to delete Gallery Image?');
		$.ajax({
        url: 'removegallery',
        type: 'get',
        data: {galleryid:galleryid},
        success: function (response) {
		$('#gal'+galleryid).remove();
        }
    });
});

		", View::POS_READY , 'my-options');
?>