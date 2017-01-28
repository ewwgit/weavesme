<?php

namespace frontend\modules\vendor\models;

use Yii;

/**
 * This is the model class for table "costs".
 *
 * @property integer $costid
 * @property string $cost
 * @property integer $country
 * @property string $currency
 * @property integer $productId
 *
 * @property Countries $country0
 * @property Products $product
 */
class Costs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'costs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost', 'country', 'currency', 'productId'], 'required'],
            [['country', 'productId'], 'integer'],
            [['cost'], 'string', 'max' => 20],
            [['currency'], 'string', 'max' => 10],
           /*  [['country'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country' => 'id']],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['productId' => 'productId']], */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'costid' => 'Costid',
            'cost' => 'Cost',
            'country' => 'Country',
            'currency' => 'Currency',
            'productId' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry0()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['productId' => 'productId']);
    }
    
    public static function getCostsInfoByProductID($productId) {
    	
    	$costData = Costs::find()->asArray(true)->where(['productId' => $productId ])->all();
    	return $costData;
    }
}
