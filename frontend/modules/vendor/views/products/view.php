<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\View;
use frontend\modules\vendor\models\Branches;
use frontend\modules\vendor\models\Categories;
use frontend\modules\vendor\models\VendorInfo;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Products */

$this->title = $model->productName;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h3 class="page-header"><?= Html::encode($this->title) ?></h3>

   

    
    
    
    

</div>

<div class="col-md-12">
<div class="row">
<div class="col-md-8 col-sm-6 col-xs-12 personal-info">

          <div class="col-sm-4 col-xs-6 tital " >Product Name:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->productName; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Product Code:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->productCode; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Branch:</div>
          <div class="col-sm-7 col-xs-6 "><?= Branches::getBranchName($model->branchId); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          
          
          
          <div class="col-sm-4 col-xs-6 tital " >Category:</div>
          <div class="col-sm-7 col-xs-6 "><?= Categories::getCategoryName($model->categoryId); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          
          
          
          <div class="col-sm-4 col-xs-6 tital " >Product Status:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->productStatus; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Cash On Delivery Status:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->cashOnDeliveryStatus; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Cash On Delivery Price:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->CashOnDeliveryPrice; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Saree Fabric:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->sareeFabric; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Saree Type:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->sareeType; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Saree Work:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->sareeWork; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Saree Length:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->sareeLength; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Blouse Available:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->blouseAvailable; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Blouse Color:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->blouseColor; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Blouse Work:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->blouseWork; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Blouse Fabric:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->blouseFabric; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          <div class="col-sm-4 col-xs-6 tital " >Blouse Size:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->blouseSize; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Petti Coat:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->pettiCoat; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Occation:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->occation; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Wash Care:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->WashCare; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Description:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->description; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Created By:</div>
          <div class="col-sm-7 col-xs-6 "><?= VendorInfo::getuserName($model->createdBy); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Updated By:</div>
          <div class="col-sm-7 col-xs-6 "><?= VendorInfo::getuserName($model->updatedBy); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Created Date:</div>
          <div class="col-sm-7 col-xs-6 "><?= date('d-M-Y H:i:s',strtotime($model->createdDate)); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Updated Date:</div>
          <div class="col-sm-7 col-xs-6 "><?= date('d-M-Y H:i:s',strtotime($model->updatedDate)); ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
          
          <div class="col-sm-4 col-xs-6 tital " >Status:</div>
          <div class="col-sm-7 col-xs-6 "><?= $model->status; ?></div>
          <div class="clearfix"></div>
          <div class="bot-border"></div>
          
        </div>
        </div>
        </div>
        
        <div class="col-md-12">
        <div class="row">
        <div>
    <h4>Costs</h4>
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
         
    <?php 
echo ListView::widget( [
		'dataProvider' => $costdataProvider,
		'itemView' => '_costslistview',
		'layout' => "{items}",
] );
?>   
    </div>
    </div>
    </div>
    </div>
    
    <div class="col-md-12">
        <div class="row">
        <div>
    <h4>Costs</h4>
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
         
    <?php 
echo ListView::widget( [
		'dataProvider' => $shippingdataProvider,
		'itemView' => '_shippinglistview',
		'layout' => "{items}",
] );
?>   
    </div>
    </div>
    </div>
    </div>
        
        <div class="col-md-12">
        <div class="row">
        <div>
    <h4>Product Images</h4>
    <?php 
echo ListView::widget( [
		'dataProvider' => $dataProvider,
		'itemView' => '_gallerylistview',
		'layout' => "{items}",
] );
?>   
    </div>
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