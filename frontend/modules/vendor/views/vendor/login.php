<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="form">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body">
            <h2>Login</h2>
            <hr>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                 <?= $form->field($model, 'rememberMe')->checkbox() ?>
                 <div id="frgtp">
                  <?= Html::a('Forgot Password?', ['site/request-password-reset'],['class' => 'btn btn-link pull-right']) ?>.
                  </div>
                

              
                    <?= Html::submitButton('Login', ['class' => 'login_button', 'name' => 'login-button']) ?>
                

            <?php ActiveForm::end(); ?>
            
          </div>
          <!--/panel-body--> 
        </div>
      </div>
    </div>
  </div>
