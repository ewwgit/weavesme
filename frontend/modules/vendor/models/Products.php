<?php

namespace frontend\modules\vendor\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "products".
 *
 * @property integer $productId
 * @property string $productCode
 * @property integer $vendorId
 * @property integer $branchId
 * @property string $productName
 * @property integer $categoryId
 * @property string $description
 * @property string $productStatus
 * @property string $cashOnDeliveryStatus
 * @property string $CashOnDeliveryPrice
 * @property string $productColor
 * @property string $sareeFabric
 * @property string $sareeType
 * @property string $sareeWork
 * @property string $sareeLength
 * @property string $blouseAvailable
 * @property string $blouseColor
 * @property string $blouseWork
 * @property string $blouseFabric
 * @property string $blouseSize
 * @property string $pettiCoat
 * @property string $occation
 * @property string $WashCare
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $createdDate
 * @property string $updatedDate
 * @property string $status
 *
 * @property Costs[] $costs
 * @property ProductGalleries[] $productGalleries
 * @property ProductShipping[] $productShippings
 * @property Branches $branch
 * @property Categories $category
 * @property User $vendor
 */
class Products extends \yii\db\ActiveRecord
{
	public $alreadyOccations;
	public $alreadyProductColor;
	public $alreadyBlouseColor;
	public $costs;
	public $countriesList;
	public $shipping;
	public $galleryImages;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productCode',  'branchId', 'productName', 'categoryId', 'productStatus', 'cashOnDeliveryStatus', 'blouseAvailable', 'pettiCoat', 'status'], 'required'],
           /*  [['vendorId', 'branchId', 'categoryId', 'createdBy', 'updatedBy'], 'integer'], */
            /* [['description', 'productStatus', 'cashOnDeliveryStatus', 'productColor', 'blouseAvailable', 'blouseColor', 'pettiCoat', 'occation', 'status'], 'string'], */
            [['createdDate', 'updatedDate','alreadyOccations','description', 'productStatus', 'cashOnDeliveryStatus', 'productColor', 'blouseAvailable', 'blouseColor', 'pettiCoat', 'occation', 'status','costs','countriesList','shipping','galleryImages'], 'safe'],
           /*  [['productCode', 'CashOnDeliveryPrice'], 'string', 'max' => 20],
            [['productName', 'sareeFabric', 'sareeType', 'sareeWork', 'sareeLength', 'blouseWork', 'blouseFabric', 'blouseSize', 'WashCare'], 'string', 'max' => 200], */
            [['branchId'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branchId' => 'branchId']],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['categoryId' => 'catId']],
            [['vendorId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['vendorId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productId' => 'Product ID',
            'productCode' => 'Product Code',
            'vendorId' => 'Vendor ID',
            'branchId' => 'Branch ID',
            'productName' => 'Product Name',
            'categoryId' => 'Category ID',
            'description' => 'Description',
            'productStatus' => 'Product Status',
            'cashOnDeliveryStatus' => 'Cash On Delivery Status',
            'CashOnDeliveryPrice' => 'Cash On Delivery Price',
            'productColor' => 'Product Color',
            'sareeFabric' => 'Saree Fabric',
            'sareeType' => 'Saree Type',
            'sareeWork' => 'Saree Work',
            'sareeLength' => 'Saree Length',
            'blouseAvailable' => 'Blouse Available',
            'blouseColor' => 'Blouse Color',
            'blouseWork' => 'Blouse Work',
            'blouseFabric' => 'Blouse Fabric',
            'blouseSize' => 'Blouse Size',
            'pettiCoat' => 'Petti Coat',
            'occation' => 'Occation',
            'WashCare' => 'Wash Care',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCosts()
    {
        return $this->hasMany(Costs::className(), ['productId' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGalleries()
    {
        return $this->hasMany(ProductGalleries::className(), ['productId' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductShippings()
    {
        return $this->hasMany(ProductShipping::className(), ['productId' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['branchId' => 'branchId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['catId' => 'categoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(User::className(), ['id' => 'vendorId']);
    }
}
