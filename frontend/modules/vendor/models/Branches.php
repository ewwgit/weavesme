<?php

namespace frontend\modules\vendor\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property integer $branchId
 * @property integer $vendorId
 * @property string $branchName
 * @property string $address1
 * @property string $address2
 * @property integer $city
 * @property integer $state
 * @property integer $country
 * @property string $postalCode
 * @property string $aboutShop
 * @property string $status
 *
 * @property Products[] $products
 */
class Branches extends \yii\db\ActiveRecord
{
	public $countriesList;
	public $statesData;
	public $citiesData;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'branchName', 'country', 'status'], 'required'],
            [['vendorId', 'city', 'state', 'country'], 'integer'],
            [['address1', 'address2', 'aboutShop', 'status'], 'string'],
            [['branchName'], 'string', 'max' => 200],
            [['postalCode'], 'string', 'max' => 20],
        	[['countriesList','statesData','citiesData','country'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branchId' => 'Branch ID',
            'vendorId' => 'Vendor ID',
            'branchName' => 'Branch Name',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'postalCode' => 'Postal Code',
            'aboutShop' => 'About Shop',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['branchId' => 'branchId']);
    }
    public static function getBranchName($id)
    {
    	$branchInfo = Branches::find()->select(['branchName'])->where(['branchId' => $id])->one();
    	return $branchInfo->branchName;
    }
}
