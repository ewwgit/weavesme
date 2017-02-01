<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
    <div class="form">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body">
            <h2>Signup</h2>
            <hr>
             <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                 <?= $form->field($model, 'confirm')->passwordInput() ?>
              <div class="text">
                <p>By clicking on Sign up, you agree to <a href="#">terms & conditions</a> and <a href="#">privacy policy</a></p>
              </div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'signup_button', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            
          </div>
          <!--/panel-body--> 
        </div>
      </div>
    </div>
  </div>
