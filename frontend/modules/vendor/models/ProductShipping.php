<?php

namespace frontend\modules\vendor\models;

use Yii;

/**
 * This is the model class for table "product_shipping".
 *
 * @property integer $productShippingId
 * @property string $shipingCost
 * @property integer $shipingCountry
 * @property string $shipingCurrency
 * @property integer $productId
 *
 * @property Countries $shipingCountry0
 * @property Products $product
 */
class ProductShipping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_shipping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipingCost', 'shipingCountry', 'shipingCurrency', 'productId'], 'required'],
            /* [['shipingCountry', 'productId'], 'integer'],
            [['shipingCost'], 'string', 'max' => 20],
            [['shipingCurrency'], 'string', 'max' => 10], */
            /* [['shipingCountry'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['shipingCountry' => 'id']],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['productId' => 'productId']], */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productShippingId' => 'Product Shipping ID',
            'shipingCost' => 'Shiping Cost',
            'shipingCountry' => 'Shiping Country',
            'shipingCurrency' => 'Shiping Currency',
            'productId' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipingCountry0()
    {
        return $this->hasOne(Countries::className(), ['id' => 'shipingCountry']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['productId' => 'productId']);
    }
    
    public static function getShippingInfoByProductID($productId) {
    	 
    	$productData = ProductShipping::find()->asArray(true)->where(['productId' => $productId ])->all();
    	return $productData;
    }
}
