<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\modules\vendor\models\Products;
use frontend\modules\vendor\models\Categories;
use yii\data\ArrayDataProvider;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	$this->layout = 'customermain';
    	$model = new Products();
    	
    	$firstCategoryId = 28;
    	$frcategory = Categories::find()->select('name')->where(['catId' => $firstCategoryId])->one();
    	$categoryName1 = $frcategory->name;
    	$firstCategory = ['28'];
    	$firstcategorysubcat = Categories::find()->where(['parentCategoryId' => $firstCategoryId])->all();
    	
    	foreach ($firstcategorysubcat as $subcat)
    	{
    		$firstCategory[] = $subcat->catId;
    	}
    	$allProducts = Products::find()->where(['IN','categoryId',$firstCategory])->all();
    	$category1 = new ArrayDataProvider([
    			'allModels' => $allProducts,
    	
    			'pagination' => false
    	
    	]);
    	
    	$secondCategoryId = 23;
    	$sccategory = Categories::find()->select('name')->where(['catId' => $secondCategoryId])->one();
    	$categoryName2 = $sccategory->name;
    	$secondCategory = ['23'];
    	$secondcategorysubcat = Categories::find()->where(['parentCategoryId' => $secondCategoryId])->all();
    	 
    	foreach ($secondcategorysubcat as $ssubcat)
    	{
    		$secondCategory[] = $ssubcat->catId;
    	}
    	$sallProducts = Products::find()->where(['IN','categoryId',$secondCategory])->all();
    	$category2 = new ArrayDataProvider([
    			'allModels' => $sallProducts,
    			 
    			'pagination' => false
    			 
    	]);
    	
    	$thirdCategoryId = 4;
    	$thcategory = Categories::find()->select('name')->where(['catId' => $thirdCategoryId])->one();
    	$categoryName3 = $thcategory->name;
    	$thirdCategory = ['4'];
    	$thirdcategorysubcat = Categories::find()->where(['parentCategoryId' => $thirdCategoryId])->all();
    	
    	foreach ($thirdcategorysubcat as $tsubcat)
    	{
    		$thirdCategory[] = $tsubcat->catId;
    	}
    	$tallProducts = Products::find()->where(['IN','categoryId',$thirdCategory])->all();
    	$category3 = new ArrayDataProvider([
    			'allModels' => $tallProducts,
    	
    			'pagination' => false
    	
    	]);
    	
    	$fourthCategoryId = 49;
    	$forcategory = Categories::find()->select('name')->where(['catId' => $fourthCategoryId])->one();
    	$categoryName4 = $forcategory->name;
    	$fourthCategory = ['49'];
    	$fourthcategorysubcat = Categories::find()->where(['parentCategoryId' => $fourthCategoryId])->all();
    	 
    	foreach ($fourthcategorysubcat as $fsubcat)
    	{
    		$fourthCategory[] = $fsubcat->catId;
    	}
    	$fallProducts = Products::find()->where(['IN','categoryId',$fourthCategory])->all();
    	$category4 = new ArrayDataProvider([
    			'allModels' => $fallProducts,
    			 
    			'pagination' => false
    			 
    	]);
    	//print_r($allProducts);exit();
        return $this->render('index',[
        		'category1' => $category1,
        		'category2' => $category2,
        		'category3' => $category3,
        		'category4' => $category4,
        		'categoryName1' => $categoryName1,
        		'categoryName2' => $categoryName2,
        		'categoryName3' => $categoryName3,
        		'categoryName4' => $categoryName4,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
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
        Yii::$app->user->logout();

        return $this->goHome();
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
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
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
