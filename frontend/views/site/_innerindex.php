<?php

use yii\helpers\Html;
use yii\helpers\BaseStringHelper;
use frontend\modules\vendor\models\Costs;
use frontend\modules\vendor\models\ProductGalleries;
$country = '101';
$costsInfo = Costs::find()->where(['country' => $country,'productId' =>  $model->productId])->one();
$symbol = '$';
if($costsInfo->currency == 'INR')
{
	$symbol = '&#8377;';
}
if($costsInfo->currency == 'USD')
{
	$symbol = '$';
}
$imageurl = 'web/uploads/productgallery/no-image.jpg';
$productGalleryImges = ProductGalleries::find()->where(['productId' => $model->productId])->one();
if(!empty($productGalleryImges))
{
	$imageurl =$productGalleryImges->imagePath; 
}
?>


                    <div class="left-block"> <a href="#"> <img class="img-responsive" alt="product" src="frontend/<?= $imageurl; ?>" /> </a>
                      <div class="quick-view"> <a title="Add to my wishlist" class="heart" href="#"></a> <a title="Add to compare" class="compare" href="#"></a> <a title="Quick view" class="search" href="#"></a> </div>
                      <div class="add-to-cart"> <a title="Add to Cart" href="#">Add to Cart</a> </div>
                      <div class="group-price"> <span class="product-new">NEW</span> <span class="product-sale">Sale</span> </div>
                    </div>
                    <div class="right-block">
                      <h5 class="product-name"><a href="#" title="<?= $model->productName;?>"> <?=  BaseStringHelper::truncate($model->productName, 26,'..')?></a></h5>
                      <div class="content_price"> <span class="price product-price"><?= $symbol; ?><?= $costsInfo->cost; ?></span> <span class="price old-price"><?= $symbol; ?><?= $costsInfo->regularPrice; ?></span> </div>
                      <div class="product-star"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> </div>
                    </div>
                  