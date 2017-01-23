<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'productId') ?>

    <?= $form->field($model, 'productCode') ?>

    <?= $form->field($model, 'vendorId') ?>

    <?= $form->field($model, 'branchId') ?>

    <?= $form->field($model, 'productName') ?>

    <?php // echo $form->field($model, 'categoryId') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'productStatus') ?>

    <?php // echo $form->field($model, 'cashOnDeliveryStatus') ?>

    <?php // echo $form->field($model, 'CashOnDeliveryPrice') ?>

    <?php // echo $form->field($model, 'productColor') ?>

    <?php // echo $form->field($model, 'sareeFabric') ?>

    <?php // echo $form->field($model, 'sareeType') ?>

    <?php // echo $form->field($model, 'sareeWork') ?>

    <?php // echo $form->field($model, 'sareeLength') ?>

    <?php // echo $form->field($model, 'blouseAvailable') ?>

    <?php // echo $form->field($model, 'blouseColor') ?>

    <?php // echo $form->field($model, 'blouseWork') ?>

    <?php // echo $form->field($model, 'blouseFabric') ?>

    <?php // echo $form->field($model, 'blouseSize') ?>

    <?php // echo $form->field($model, 'pettiCoat') ?>

    <?php // echo $form->field($model, 'occation') ?>

    <?php // echo $form->field($model, 'WashCare') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'createdDate') ?>

    <?php // echo $form->field($model, 'updatedDate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
