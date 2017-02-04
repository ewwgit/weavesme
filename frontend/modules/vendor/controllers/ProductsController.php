<?php

namespace frontend\modules\vendor\controllers;

use Yii;
use frontend\modules\vendor\models\Products;
use frontend\modules\vendor\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Countries;
use frontend\modules\vendor\models\Costs;
use frontend\modules\vendor\models\ProductShipping;
use yii\web\UploadedFile;
use frontend\modules\vendor\models\ProductGalleries;
use yii\data\ActiveDataProvider;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $paramsary = Yii::$app->request->queryParams;
        $paramsary['searchnewType'] = 'vendor';
        $dataProvider = $searchModel->search($paramsary);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$query = ProductGalleries::find()->where(['productId' => $id]);
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			'pagination' => false
    	]);
        return $this->render('view', [
            'model' => $this->findModel($id),
        	'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        $model->countriesList = Countries::getCountries();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->createdDate = date('Y-m-d H:i:s');
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->vendorId = Yii::$app->vendoruser->vendorid;
        	$model->createdBy = Yii::$app->vendoruser->vendorid;
        	$model->updatedBy = Yii::$app->vendoruser->vendorid;
        	$model->save();
        	
        	$costsCount = count($model->costs);
        	$costsData = $model->costs;
        	if($costsCount != 0)
        	{
        		Costs::deleteAll( ['productId' => $model->productId]);
        		for($c=0; $c < $costsCount; $c++)
        		{
        			$costsModel = new Costs();
        			$costsModel->productId =  $model->productId;
        			$costsModel->cost =  $costsData[$c]['cost'];
        			$costsModel->regularPrice =  $costsData[$c]['regularPrice'];
        			$costsModel->currency =  $costsData[$c]['currency'];
        			$costsModel->country =  $costsData[$c]['country'];
        			$costsModel->save();
        		}
        	}
        	//print_r($model->shipping);exit();
        	$shippingCount = count($model->shipping);
        	$shippingData = $model->shipping;
        	if($shippingCount != 0)
        	{
        		ProductShipping::deleteAll( ['productId' => $model->productId]);
        		for($s=0; $s < $shippingCount; $s++)
        		{
        			$shippingModel = new ProductShipping();
        			$shippingModel->productId =  $model->productId;
        			$shippingModel->shipingCost =  $shippingData[$s]['shipingCost'];
        			$shippingModel->shipingCountry =  $shippingData[$s]['shipingCountry'];
        			$shippingModel->shipingCurrency =  $shippingData[$s]['shipingCurrency'];
        			$shippingModel->save();
        			//print_r($shippingModel->errors);exit();
        		}
        	}
        	$model->galleryImages = UploadedFile::getInstances($model, 'galleryImages');
        	foreach ($model->galleryImages as $file) {
        		 
        		$galleryImges = new ProductGalleries();
        		$galleryImges->productId= $model->productId;
        		$imageName = rand(1000,100000).str_replace(' ', "_", $file->baseName);
        		$galleryImges->imagePath = 'web/uploads/productgallery/'.$imageName.'.'.$file->extension;
        		$galleryImges->createdDate = date('Y-m-d H:i:s');
        		$galleryImges->save();
        		 
        		$file->saveAs(realpath(Yii::$app->basePath).'/web/uploads/productgallery/' . $imageName . '.' . $file->extension);
        	}
        	
            return $this->redirect(['view', 'id' => $model->productId]);
        } else {
        	
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->costs = Costs::getCostsInfoByProductID($id);
        
        $model->shipping = ProductShipping::getShippingInfoByProductID($id);
       /*  print_r($model->costs);
        print_r($model->shipping);exit(); */
        $model->countriesList = Countries::getCountries();
        if($model->occation != '')
        {
        	$allOccations = explode(',', $model->occation);
        	$model->occation = $allOccations;
        	$availableOccations = array();
        	for($i=0;$i<count($allOccations); $i++)
        	{
        		$availableOccations[$allOccations[$i]] = $allOccations[$i];
        	}
        	$model->alreadyOccations = $availableOccations;
        }
        if($model->blouseColor != '')
        {
        	$allBlouseColors = explode(',', $model->blouseColor);
        	$model->blouseColor = $allBlouseColors;
        	$availableBlouseColors = array();
        	for($k=0;$k<count($allBlouseColors); $k++)
        	{
        		$availableBlouseColors[$allBlouseColors[$k]] = $allBlouseColors[$k];
        	}
        	$model->alreadyBlouseColor = $availableBlouseColors;
        }
        if($model->productColor != '')
        {
        	$allProductColor = explode(',', $model->productColor);
        	$model->productColor = $allProductColor;
        	$availableProductColor = array();
        	for($m=0;$m<count($allProductColor); $m++)
        	{
        		$availableProductColor[$allProductColor[$m]] = $allProductColor[$m];
        	}
        	$model->alreadyProductColor = $availableProductColor;
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->vendorId = Yii::$app->vendoruser->vendorid;
        	$model->updatedBy = Yii::$app->vendoruser->vendorid;
        	$model->occation = implode(',', $model->occation);
        	$model->blouseColor = implode(',', $model->blouseColor);
        	$model->productColor = implode(',', $model->productColor);
        	$model->save();
        	
        	$costsCount = count($model->costs);
        	$costsData = $model->costs;
        	if($costsCount != 0)
        	{
        		Costs::deleteAll( ['productId' => $model->productId]);
        		for($c=0; $c < $costsCount; $c++)
        		{
        			$costsModel = new Costs();
        			$costsModel->productId =  $model->productId;
        			$costsModel->cost =  $costsData[$c]['cost'];
        			$costsModel->regularPrice =  $costsData[$c]['regularPrice'];
        			$costsModel->currency =  $costsData[$c]['currency'];
        			$costsModel->country =  $costsData[$c]['country'];
        			$costsModel->save();
        		}
        	}
        	//print_r($model->shipping);exit();
        	$shippingCount = count($model->shipping);
        	$shippingData = $model->shipping;
        	if($shippingCount != 0)
        	{
        		ProductShipping::deleteAll( ['productId' => $model->productId]);
        		for($s=0; $s < $shippingCount; $s++)
        		{
        			$shippingModel = new ProductShipping();
        			$shippingModel->productId =  $model->productId;
        			$shippingModel->shipingCost =  $shippingData[$s]['shipingCost'];
        			$shippingModel->shipingCountry =  $shippingData[$s]['shipingCountry'];
        			$shippingModel->shipingCurrency =  $shippingData[$s]['shipingCurrency'];
        			$shippingModel->save();
        			//print_r($shippingModel->errors);exit();
        		}
        	}
        	$model->galleryImages = UploadedFile::getInstances($model, 'galleryImages');
        	foreach ($model->galleryImages as $file) {
        		 
        		$galleryImges = new ProductGalleries();
        		$galleryImges->productId= $model->productId;
        		$imageName = rand(1000,100000).str_replace(' ', "_", $file->baseName);
        		$galleryImges->imagePath = 'web/uploads/productgallery/'.$imageName.'.'.$file->extension;
        		$galleryImges->createdDate = date('Y-m-d H:i:s');
        		$galleryImges->save();
        		 
        		$file->saveAs(realpath(Yii::$app->basePath).'/web/uploads/productgallery/' . $imageName . '.' . $file->extension);
        	}
        	//print_r($model->costs);exit();
            return $this->redirect(['view', 'id' => $model->productId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::find()->where(['productId' => $id,'vendorId' => Yii::$app->vendoruser->vendorid])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionRemovegallery()
    {
    	$galleryId = $_GET['galleryid'];
    	$model = ProductGalleries::find()->where(['productGalleryId' => $galleryId])->one();
    	$model->delete();
    	/* Yii::$app->getSession()->setFlash('success', [
    			'type' => 'success',
    			'duration' => 20000,
    			'icon' => 'fa fa-users',
    			'message' => 'You are successfully deleted gallery image.',
    			'title' => 'Success',
    			'positonY' => 'bottom',
    			'positonX' => 'right'
    	]);
    	$this->redirect(['showgallery']); */
    	return true;
    }
    
}
