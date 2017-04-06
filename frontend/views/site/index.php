<?php
use yii\widgets\ListView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

 <?php $form = ActiveForm::begin(['id' => 'search-form']); ?>
<div class="container">
    <div class="main-text hidden-xs hidden-sm">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleSelect1">State</label>
              <?= $form->field($srmodel, 'state')->dropDownList($srmodel->stateData,['prompt'=>'Select State'])->label(false);?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleSelect1">City</label>
              
              <?php echo $form->field($srmodel, 'city')->widget(DepDrop::classname(), [
                   		'data'=>$srmodel->cityData,
    'pluginOptions'=>[
        'depends'=>['searchform-state'],
        'placeholder'=>'Select City',
        'url'=>Url::to(['/site/cities'])
    ]
])->label(false);?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleSelect1">Vendor</label>
              
              <?php echo $form->field($srmodel, 'vendor')->widget(DepDrop::classname(), [
                   		'data'=>$srmodel->vendorData,
    'pluginOptions'=>[
        'depends'=>['searchform-city'],
        'placeholder'=>'Select Vendor',
        'url'=>Url::to(['/site/vendors'])
    ]
])->label(false);?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleSelect1">Category</label>
              
              <?php echo $form->field($srmodel, 'category')->widget(DepDrop::classname(), [
                   		'data'=>$srmodel->categoryData,
    'pluginOptions'=>[
        'depends'=>['searchform-vendor'],
        'placeholder'=>'Select Category',
        'url'=>Url::to(['/site/categories'])
    ]
])->label(false);?>
            </div>
          </div>
        </div>
        <div class="button"><a href="#">search</a></div>
      </div>
    </div>
  </div>
  <?php ActiveForm::end(); ?>
  
</div>
<div class="clearfix"></div>
<div id="bg">
  <div class="page-top">

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 page-top-left">
          <div class="popular-tabs">
            <ul class="nav-tab">
              <li class="active"><a data-toggle="tab" href="#tab-1"><?= $categoryName1;?></a></li>
            </ul>
            <div class="tab-container">
              <div id="tab-1" class="tab-panel active">
                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
                <?php 
echo ListView::widget( [
		'dataProvider' => $category1,
		'itemView' => '_innerindex',
		'layout' => "{items}",
		'itemOptions' => ['tag' => 'li'],
		'options' => [
				'tag'=>false,
				
		]
] );
?>   
                  
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 page-top-left">
          <div class="popular-tabs">
            <ul class="nav-tab">
              <li class="active"><a data-toggle="tab" href="#tab-1"><?= $categoryName2;?></a></li>
            </ul>
            <div class="tab-container">
              <div id="tab-1" class="tab-panel active">
                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
                  <?php 
echo ListView::widget( [
		'dataProvider' => $category2,
		'itemView' => '_innerindex',
		'layout' => "{items}",
		'itemOptions' => ['tag' => 'li'],
		'options' => [
				'tag'=>false,
				
		]
] );
?>  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 page-top-left">
          <div class="popular-tabs">
            <ul class="nav-tab">
              <li class="active"><a data-toggle="tab" href="#tab-1"><?= $categoryName3;?></a></li>
            </ul>
            <div class="tab-container">
              <div id="tab-1" class="tab-panel active">
                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
                  <?php 
echo ListView::widget( [
		'dataProvider' => $category3,
		'itemView' => '_innerindex',
		'layout' => "{items}",
		'itemOptions' => ['tag' => 'li'],
		'options' => [
				'tag'=>false,
				
		]
] );
?>  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 page-top-left">
          <div class="popular-tabs">
            <ul class="nav-tab">
              <li class="active"><a data-toggle="tab" href="#tab-1"><?= $categoryName4;?></a></li>
            </ul>
            <div class="tab-container">
              <div id="tab-1" class="tab-panel active">
                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
                  <?php 
echo ListView::widget( [
		'dataProvider' => $category4,
		'itemView' => '_innerindex',
		'layout' => "{items}",
		'itemOptions' => ['tag' => 'li'],
		'options' => [
				'tag'=>false,
				
		]
] );
?>  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="load_more_buuton"><a href="#">Load More</a></div>
      </div>
    </div>
