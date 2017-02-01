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




 <div class="row"> 

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
 <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="text-center"> <img src="images/logo.png" class="avatar img-circle img-thumbnail" alt="avatar">
            <h6>Upload a different photo...</h6>
            
            <?= $form->field($model, 'profileImage')->widget(FileInput::classname(), [
		'options' => ['accept' => 'image/*','multiple' => false],
]);
?>
          </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
        <div class="row"> 
          <div class="col-md-5">
          <?= $form->field($model, 'companyName')->textInput(['maxlength' => true]) ?>
          </div>
          </div>
          <div class="row"> 
     <div class="col-md-5">
    <?= $form->field($model, 'regNumber')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    
    <div class="row"> 
     <div class="col-md-5">
    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

        <div class="row"> 
      <div class="col-md-5">
    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    
    <div class="row"> 
     <div class="col-md-5">

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    
    <div class="row"> 
     <div class="col-md-5">

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    
    
    <div class="row"> 
     <div class="col-md-5">

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    
    <div class="row"> 
     <div class="col-md-5">
    
    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
    </div>
    </div>

    

    <div class="row"> 
    <div class="col-md-5">
    <?= $form->field($model, 'country')->dropDownList($model->countriesList,['prompt'=>'Select Countries']);?>
    </div>
    </div>

<div class="row"> 
    <div class="col-md-5">
    <?php echo $form->field($model, 'state')->widget(DepDrop::classname(),[
                    		'data'=>$model->statesData,
    'pluginOptions'=>[
        'depends'=>['vendorinfo-country'],
        'placeholder'=>'Select States',
        'url'=>Url::to(['/vendor/branches/states'])
    ]
]);?>
</div>
</div>

<div class="row"> 
 <div class="col-md-5">

   <?php echo $form->field($model, 'city')->widget(DepDrop::classname(), [
                   		'data'=>$model->citiesData,
    'pluginOptions'=>[
        'depends'=>['vendorinfo-state'],
        'placeholder'=>'Select Cities',
        'url'=>Url::to(['/vendor/branches/cities'])
    ]
]);?>
</div>
</div>

<div class="row"> 
 <div class="col-md-5">

    <?= $form->field($model, 'postalCode')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        </div>
<?php ActiveForm::end(); ?>
 </div>