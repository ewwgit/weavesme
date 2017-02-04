<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">
<div class="col-md-4">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'branchName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address2')->textarea(['rows' => 6]) ?>

    
   
    <?= $form->field($model, 'country')->dropDownList($model->countriesList,['prompt'=>'Select Countries']);?>

   
    <?php echo $form->field($model, 'state')->widget(DepDrop::classname(),[
                    		'data'=>$model->statesData,
    'pluginOptions'=>[
        'depends'=>['branches-country'],
        'placeholder'=>'Select States',
        'url'=>Url::to(['/vendor/branches/states'])
    ]
]);?>

   <?php echo $form->field($model, 'city')->widget(DepDrop::classname(), [
                   		'data'=>$model->citiesData,
    'pluginOptions'=>[
        'depends'=>['branches-state'],
        'placeholder'=>'Select Cities',
        'url'=>Url::to(['/vendor/branches/cities'])
    ]
]);?>

    <?= $form->field($model, 'postalCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aboutShop')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
