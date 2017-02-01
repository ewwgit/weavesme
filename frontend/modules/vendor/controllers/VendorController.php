<?php

namespace frontend\modules\vendor\controllers;

use Yii;
use frontend\modules\vendor\models\VendorInfo;
use frontend\modules\vendor\models\VendorInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
//use yii2mod\rbac\filters\AccessControl;
use frontend\modules\vendor\models\VendorrolesModel;
use yii\filters\AccessControl;
use backend\models\Countries;
use backend\models\States;
use backend\models\Cities;
use yii\helpers\Json;
use yii\web\UploadedFile;
use common\models\User;

/**
 * VendorController implements the CRUD actions for VendorInfo model.
 */
class VendorController extends Controller
{
	public $layout = 'vendorInner';
    /**
     * @inheritdoc
     */
public function behaviors()
	{
	
		$permissionsArray = [''];
		
		if(VendorrolesModel::getRole() == 2)
		{
			
			$permissionsArray = ['index','view','create','update','view','delete','signup','login','logout','contact','request-password-reset','reset-assword','about'
			];
		}
		else {
			$permissionsArray = ['contact','request-password-reset','reset-assword','about','index','signup','login','logout'];
		}
	
	
		
		return [
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								
						],
				],
				'access' => [
						'class' => AccessControl::className(),
						'only' => [
								'index','view','create','update','view','delete','signup','login','logout','contact','request-password-reset','reset-assword','about'
	
						],
						'rules' => [
								[
										'actions' => $permissionsArray,
										'allow' => true,
										'matchCallback' => function ($rule, $action) {
											
										if((VendorrolesModel::getRole() == 2) || (VendorrolesModel::getRole() == 0))
										{
	
											return true;
										}
										}
										],
										[
												'denyCallback' => function ($rule, $action) {
													
												$this->redirect(Yii::$app->urlManager->createUrl(['vendors-login']));
												}
												]
												]
												]
												];
	}
    
    
    /* public function behaviors()
    {
    	return [
    			'access' => [
    					'class' => AccessControl::className(),
    					'rules' => [
    							
    							[
    							'allow' => true,
    							'actions' => ['index','signup','login'],
    							'roles' => ['?'],
    							],
    							[
    							'allow' => true,
    							'actions' => ['index','update'],
    							'roles' => ['vendor'],
    							],
    							
    							
    					],
    			],
    	];
    } */

    /**
     * Lists all VendorInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendorInfoSearch();
        $paramsary = Yii::$app->request->queryParams;
        $paramsary['searchnewType'] = 'vendor';
        $dataProvider = $searchModel->search($paramsary);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VendorInfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
    	$id = Yii::$app->vendoruser->vendorid;
    	$model = $this->findModel($id);
    	$userInfo = User::find()->where(['id' => $model->vendorId])->one();
    	$model->userName = $userInfo->username;
    	$model->email = $userInfo->email;
    	if($model->city != '')
    	{
    	$model->city = Cities::getCityName($model->city);
    	}
    	if($model->state != '')
    	{
    		$model->state = States::getStateName($model->state);
    	}
    	if($model->country != '')
    	{
    		$model->country = Countries::getCountryName($model->country);
    	}
        return $this->render('view', [
            'model' => $model ,
        ]);
    }

    /**
     * Creates a new VendorInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VendorInfo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vendorInfoId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VendorInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
    	$this->layout = 'vendorInner';
    	$id = Yii::$app->vendoruser->vendorid;
        $model = $this->findModel($id);
        $model->viewProfileImage = $model->profileImage;
        $model->profileImage = '';
        $userInfo = User::find()->where(['id' => $model->vendorId])->one();
        $model->userName = $userInfo->username;
        $model->email = $userInfo->email;
        $userhaveRecords = 1;
       if($model == NULL)
       {
       	$userhaveRecords = 0;
       	$model = new VendorInfo();
       }
       $model->countriesList = Countries::getCountries();
       $model->citiesData = [];
       if($model->country != '')
       {
       	//$model->country = Countries::getCountryId($model->country);
       	$model->statesData = Countries::getStatesByCountryview($model->country);
       	//$model->state =  States::getStateId($model->state);
       }
       else{
       	$model->country = $model->country;
       	$model->statesData = [];
       	$model->state =  '';
       }
       if($model->state != '')
       {
       
       	$model->citiesData = Cities::getCiteslist($model->state);
       	//$model->city = Cities::getCityId($model->city);
       
       }
       
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	if($userhaveRecords == 0)
        	{
        		$model->createdDate = date('Y-m-d H:i:s');
        		$model->createdBy = Yii::$app->vendoruser->vendorid;
        	}
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->updatedBy = Yii::$app->vendoruser->vendorid;
        	$model->vendorId = Yii::$app->vendoruser->vendorid;
        	
        	$model->profileImage = UploadedFile::getInstance($model,'profileImage');
        	
        	if(!(empty($model->profileImage)))
        	{
        		$profileimage=$model->profileImage;
        		
        		
        		$imageName = rand(1000,100000).str_replace(' ', "_", $model->profileImage->baseName);
        		
        		$model->profileImage->saveAs(realpath(Yii::$app->basePath).'/web/uploads/profile/' . $imageName . '.' . $model->profileImage->extension);
        		
        		$model->profileImage = '/frontend/web/uploads/profile/'.$imageName.'.'.$model->profileImage->extension;
        		
        	}
        	
        	$model->save();
            return $this->redirect(['view']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing VendorInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VendorInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VendorInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VendorInfo::find()->where(['vendorId' => $id])->one()) !== null) {
        	
            return $model;
        } else {
        	return $model;
            //throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionSignup()
    {
    	$this->layout = 'vendorpublic';
    	$model = new SignupForm();
    	if ($model->load(Yii::$app->request->post())) {
    		if ($user = $model->signup()) {
    			return $this->redirect('vendors-login');
    			/* if (Yii::$app->getUser()->login($user)) {
    				return $this->goHome();
    			} */
    		}
    	}
    
    	return $this->render('signup', [
    			'model' => $model,
    	]);
    }
    
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
    	$this->layout = 'vendorpublic';
    	if (Yii::$app->vendoruser->vendorid != '') {
    		return $this->goHome();
    	}
    
    	$model = new LoginForm();
    	if ($model->load(Yii::$app->request->post()) && $model->login()) {
    		
    		if($model->user->roleId == 2)
    		{
    			\Yii::$app->session->set('user.vendorid',$model->user->id);
    			\Yii::$app->session->set('user.vendorusername',$model->user->username);
    			\Yii::$app->session->set('user.vendorpassword_hash',$model->user->password_hash);
    			\Yii::$app->session->set('user.vendorpassword_reset_token',$model->user->password_reset_token);
    			\Yii::$app->session->set('user.vendoremail',$model->user->email);
    			\Yii::$app->session->set('user.vendorauth_key',$model->user->auth_key);
    			\Yii::$app->session->set('user.vendorstatus',$model->user->status);
    			\Yii::$app->session->set('user.vendorcreated_at',$model->user->created_at);
    			\Yii::$app->session->set('user.vendorupdated_at',$model->user->updated_at);
    			\Yii::$app->session->set('user.vendorroleId',$model->user->roleId);
    			
    			return Yii::$app->getResponse()->redirect(Yii::$app->urlManager->createUrl(['vendor/vendor/view']));
    		}
    		return $this->goBack();
    	} else {
    		return $this->render('login', [
    				'model' => $model,
    		]);
    	}
    }
    
    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
    	\Yii::$app->session->remove('user.vendorid');
	    \Yii::$app->session->remove('user.vendorusername');
	    \Yii::$app->session->remove('user.vendorpassword_hash');
	    \Yii::$app->session->remove('user.vendorpassword_reset_token');
	    \Yii::$app->session->remove('user.vendoremail');
	    \Yii::$app->session->remove('user.vendorauth_key');
	    \Yii::$app->session->remove('user.vendorstatus');
	    \Yii::$app->session->remove('user.vendorcreated_at');
	    \Yii::$app->session->remove('user.vendorupdated_at');
	    \Yii::$app->session->remove('user.vendorroleId');
    	return $this->redirect('vendors');
    }
    
    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
    	$model = new ContactForm();
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
    			Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
    		} else {
    			Yii::$app->session->setFlash('error', 'There was an error sending email.');
    		}
    
    		return $this->refresh();
    	} else {
    		return $this->render('contact', [
    				'model' => $model,
    		]);
    	}
    }
    
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
    	return $this->render('about');
    }
    
    
    
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
    	$model = new PasswordResetRequestForm();
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		if ($model->sendEmail()) {
    			Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
    
    			return $this->goHome();
    		} else {
    			Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
    		}
    	}
    
    	return $this->render('requestPasswordResetToken', [
    			'model' => $model,
    	]);
    }
    
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
    	try {
    		$model = new ResetPasswordForm($token);
    	} catch (InvalidParamException $e) {
    		throw new BadRequestHttpException($e->getMessage());
    	}
    
    	if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
    		Yii::$app->session->setFlash('success', 'New password was saved.');
    
    		return $this->goHome();
    	}
    
    	return $this->render('resetPassword', [
    			'model' => $model,
    	]);
    }
    
    
}
