<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendorId')->textInput() ?>

    <?= $form->field($model, 'branchId')->textInput() ?>

    <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryId')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'productStatus')->dropDownList([ 'In Stock' => 'In Stock', 'Out Of Stock' => 'Out Of Stock', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cashOnDeliveryStatus')->dropDownList([ 'YES' => 'YES', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'CashOnDeliveryPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productColor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sareeFabric')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sareeType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sareeWork')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sareeLength')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blouseAvailable')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'blouseColor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'blouseWork')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blouseFabric')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blouseSize')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pettiCoat')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'occation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'WashCare')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'createdDate')->textInput() ?>

    <?= $form->field($model, 'updatedDate')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
