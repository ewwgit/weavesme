<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<style>
.remove {
	color: red;
	cursor: pointer;
	width: 5px;
	float: right;
	margin-top: -7px;
}
</style>

<div style="float: left; padding: 10px;" id="gal<?= $model['productGalleryId']?>">
<div class="remove" galleryid="<?= $model['productGalleryId']?>"><span class="fa fa-times-circle"></span></div>
<div><?= Html::img(Yii::getAlias('@web').'/frontend/'.$model['imagePath'],['width' => '200px','height' => '200px','style' => 'margin-top:-7px; border:2px solid #ccc;'])?></div>

</div>

