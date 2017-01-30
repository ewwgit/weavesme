<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\VendorInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-info-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    

    
   
    <?= $form->field($model, 'country')->dropDownList($model->countriesList,['prompt'=>'Select Countries']);?>

   
    <?php echo $form->field($model, 'state')->widget(DepDrop::classname(),[
                    		'data'=>$model->statesData,
    'pluginOptions'=>[
        'depends'=>['vendorinfo-country'],
        'placeholder'=>'Select States',
        'url'=>Url::to(['/vendor/branches/states'])
    ]
]);?>

   <?php echo $form->field($model, 'city')->widget(DepDrop::classname(), [
                   		'data'=>$model->citiesData,
    'pluginOptions'=>[
        'depends'=>['vendorinfo-state'],
        'placeholder'=>'Select Cities',
        'url'=>Url::to(['/vendor/branches/cities'])
    ]
]);?>

    <?= $form->field($model, 'postalCode')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'profileImage')->widget(FileInput::classname(), [
		'options' => ['accept' => 'image/*','multiple' => false],
]);
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
