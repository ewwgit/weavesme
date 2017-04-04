<?php
use yii\widgets\ListView;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
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
