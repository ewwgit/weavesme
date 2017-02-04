<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\vendor\models\Categories;

/* @var $this yii\web\View */
/* @var $model frontend\modules\vendor\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

<div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>
    
    
    <?= $form->field($model, 'parentCategoryId')->dropDownList(ArrayHelper::map(Categories::find()->where(['vendorId' => Yii::$app->vendoruser->vendorid,'status'=>'Active'])->all(), 'catId', 'name'),['prompt' =>'Select Parent Category']);?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
