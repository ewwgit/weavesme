<?php

namespace frontend\modules\vendor\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $catId
 * @property string $name
 * @property string $description
 * @property integer $parentCategoryId
 * @property string $status
 * @property integer $vendorId
 * @property string $createdDate
 * @property string $updatedDate
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['description', 'status'], 'string'],
            [['parentCategoryId', 'vendorId'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'catId' => 'Cat ID',
            'name' => 'Name',
            'description' => 'Description',
            'parentCategoryId' => 'Parent Category ID',
            'status' => 'Status',
            'vendorId' => 'Vendor ID',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['categoryId' => 'catId']);
    }
    
    public function getParent()
    {
    	return $this->hasOne(Categories::className(), ['catId' => 'parentCategoryId'])->from(Categories::tableName() . ' parent_page');
    }
    
    public static function getCategoryName($id)
    {
    	$categoryInfo = Categories::find()->select(['name'])->where(['catId' => $id])->one();
    	return $categoryInfo->name;
    }
    
    public static function getCategoriesByVendor($vendorId)
    {
    	$citiesModel = Categories::find()->select(['catId', 'name'])->asArray()->where(['vendorId'=>$vendorId])
    	->all();
    	$cities = array();
    	for($k=0;$k<count($citiesModel); $k++)
    	{
    		$cities[$k]['id'] = $citiesModel[$k]['catId'];
    		$cities[$k]['name'] = $citiesModel[$k]['name'];
    	}
    	return $cities;
    }
}
