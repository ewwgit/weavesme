<?php

namespace frontend\modules\vendor\controllers;

use Yii;
use frontend\modules\vendor\models\Branches;
use frontend\modules\vendor\models\BranchesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Countries;
use backend\models\States;
use backend\models\Cities;
use yii\helpers\Json;

/**
 * BranchesController implements the CRUD actions for Branches model.
 */
class BranchesController extends Controller
{
	public $layout = 'vendorInner';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Branches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BranchesSearch();
        $paramsary = Yii::$app->request->queryParams;
        $paramsary['searchnewType'] = 'vendor';
        $dataProvider = $searchModel->search($paramsary);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Branches model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Branches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Branches();
        $model->countriesList = Countries::getCountries();
        $model->citiesData = [];
        if($model->country != '')
        {
        	$model->country = Countries::getCountryId($model->country);
        	$model->statesData = Countries::getStatesByCountryview($model->country);
        	$model->state =  States::getStateId($model->state);
        }
        else{
        	$model->country = $model->country;
        	$model->statesData = [];
        	$model->state =  '';
        }
        if($model->state != '')
        {
        
        	$model->citiesData = Cities::getCiteslist($model->state);
        	$model->city = Cities::getCityId($model->city);
        
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->createdDate = date('Y-m-d H:i:s');
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->vendorId = Yii::$app->vendoruser->vendorid;
        	if($model->city != '')
        	{
        		$model->cityName = Cities::getCityName($model->city);
        	}
        	if($model->state != '')
        	{
        		$model->stateName = States::getStateName($model->state);
        	}
        	if($model->country != '')
        	{
        		$model->countryName = Countries::getCountryName($model->country);
        	}
        	$model->save();
        	
            return $this->redirect(['view', 'id' => $model->branchId]);
        } else {
        	
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Branches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
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
        	$model->updatedDate = date('Y-m-d H:i:s');
        	if($model->city != '')
        	{
        		$model->cityName = Cities::getCityName($model->city);
        	}
        	if($model->state != '')
        	{
        		$model->stateName = States::getStateName($model->state);
        	}
        	if($model->country != '')
        	{
        		$model->countryName = Countries::getCountryName($model->country);
        	}
        	$model->save();
            return $this->redirect(['view', 'id' => $model->branchId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Branches model.
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
     * Finds the Branches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Branches::find()->where(['branchId' => $id,'vendorId' => Yii::$app->vendoruser->vendorid])->one()) !== null) {
        	
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionStates()
    {
    
    	$out = [];
    	if (isset($_POST['depdrop_parents'])) {
    		$parents = $_POST['depdrop_parents'];
    
    		if ($parents != null) {
    			$country = $parents[0];
    			$states = Countries::getStatesByCountry($country);
    			/* $out = [
    			 ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
    			 ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
    
    			 ]; */
    			echo Json::encode(['output'=>$states, 'selected'=>0]);
    			return;
    				
    				
    		}
    	}
    		
    	echo Json::encode(['output'=>'', 'selected'=>'']);
    		
    		
    }
    
    public function actionCities()
    {
    
    	$out = [];
    	if (isset($_POST['depdrop_parents'])) {
    		$parents = $_POST['depdrop_parents'];
    
    		if ($parents != null) {
    			$state = $parents[0];
    			$cities = Countries::getCitiesByState($state);
    			/* $out = [
    			 ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
    			 ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
    
    			 ]; */
    			echo Json::encode(['output'=>$cities, 'selected'=>0]);
    			return;
    				
    				
    		}
    	}
    		
    	echo Json::encode(['output'=>'', 'selected'=>'']);
    		
    		
    }
}
