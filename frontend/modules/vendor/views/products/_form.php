<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\vendor\models\Categories;
use frontend\modules\vendor\models\Branches;
use kartik\select2\Select2;
use unclead\multipleinput\MultipleInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">
<div class="col-md-12">
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
 <div class="col-md-10">
<div class="col-md-5">
   
    
    <?= $form->field($model, 'branchId')->dropDownList(ArrayHelper::map(Branches::find()->where(['vendorId' => Yii::$app->vendoruser->vendorid,'status'=>'Active'])->all(), 'branchId', 'branchName'),['prompt' =>'Select Branch']);?>
    
    <?= $form->field($model, 'categoryId')->dropDownList(ArrayHelper::map(Categories::find()->where(['vendorId' => Yii::$app->vendoruser->vendorid,'status'=>'Active'])->all(), 'catId', 'name'),['prompt' =>'Select  Category']);?>

    <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productCode')->textInput(['maxlength' => true]) ?>     

    <?= $form->field($model, 'productStatus')->dropDownList([ 'In Stock' => 'In Stock', 'Out Of Stock' => 'Out Of Stock', ], ['prompt' => '']) ?>
    
    <?= $form->field($model, 'productColor')->widget(Select2::classname(), [
                           		                 
                           		       'data'=>$model->alreadyProductColor,
                           		        'options' => ['placeholder' => 'Enter Product Color', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ]);
    ?>
    </div>
<div class="col-md-5">
    

    
    <?= $form->field($model, 'sareeWork')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sareeLength')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sareeFabric')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sareeType')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'cashOnDeliveryStatus')->dropDownList([ 'YES' => 'YES', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'CashOnDeliveryPrice')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    
    <div class="col-md-10">
    
    <div class="col-md-5">

    

    <?= $form->field($model, 'blouseAvailable')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    
    
    <?= $form->field($model, 'blouseColor')->widget(Select2::classname(), [
                           		                 
                           		       'data'=>$model->alreadyBlouseColor,
                           		        'options' => ['placeholder' => 'Enter Blouse Color', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ]);
    ?>

    <?= $form->field($model, 'blouseWork')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'blouseFabric')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blouseSize')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="col-md-5">

    

    <?= $form->field($model, 'pettiCoat')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    
    <?= $form->field($model, 'occation')->widget(Select2::classname(), [
                           		                 
                           		       'data'=>$model->alreadyOccations,
                           		        'options' => ['placeholder' => 'Enter Occations', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ]);
    ?>

    <?= $form->field($model, 'WashCare')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    
    
    
    </div>
    </div>


<?= $form->field($model, 'costs')->widget(MultipleInput::className(), [
    'max' => 4,
    'columns' => [
    		[
    		'name'  => 'regularPrice',
    		'enableError' => true,
    		'title' => 'Regular Price',
    		'options' => [
    				'class' => 'input-priority'
    		]
    		],
    		[
    		'name'  => 'cost',
    		'enableError' => true,
    		'title' => 'Selling Price',
    		'options' => [
    				'class' => 'input-priority'
    		]
    		],
        [
            'name'  => 'currency',
            'type'  => 'dropDownList',
            'title' => 'Currency',
            'defaultValue' => 'INR',
            'items' => [
                'INR' => 'INR',
                'USD' => 'USD'
            ]
        ],
    		
    		[
    		'name'  => 'country',
    		'type'  => 'dropDownList',
    		'title' => 'Country',
    		'defaultValue' => 101,
    		'items' => $model->countriesList
    		],
        
    		
        
        
    ]
 ])->label(false);
?>

<?= $form->field($model, 'shipping')->widget(MultipleInput::className(), [
    'max' => 4,
    'columns' => [
    		
    		[
    		'name'  => 'shipingCost',
    		'enableError' => true,
    		'title' => 'Shipping Cost',
    		'options' => [
    				'class' => 'input-priority'
    		]
    		],
        [
            'name'  => 'shipingCurrency',
            'type'  => 'dropDownList',
            'title' => 'Shipping Currency',
            'defaultValue' => 'INR',
            'items' => [
                'INR' => 'INR',
                'USD' => 'USD'
            ]
        ],
    		
    		[
    		'name'  => 'shipingCountry',
    		'type'  => 'dropDownList',
    		'title' => 'Shipping  Country',
    		'defaultValue' => 101,
    		'items' => $model->countriesList
    		],
        
    		
        
        
    ]
 ])->label(false);
?>

<?= $form->field($model, 'galleryImages[]')->widget(FileInput::classname(), [
		'options' => ['accept' => 'image/*','multiple' => true],
]);
?>

<div class="col-md-3">
<div class="row">
<?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>
</div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
