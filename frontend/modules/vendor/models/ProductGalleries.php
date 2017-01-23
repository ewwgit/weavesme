<?php

namespace frontend\modules\vendor\models;

use Yii;

/**
 * This is the model class for table "product_galleries".
 *
 * @property integer $productGalleryId
 * @property string $imagePath
 * @property integer $productId
 * @property string $createdDate
 *
 * @property Products $product
 */
class ProductGalleries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_galleries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imagePath', 'productId'], 'required'],
            [['imagePath'], 'string'],
            [['productId'], 'integer'],
            [['createdDate'], 'safe'],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['productId' => 'productId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productGalleryId' => 'Product Gallery ID',
            'imagePath' => 'Image Path',
            'productId' => 'Product ID',
            'createdDate' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['productId' => 'productId']);
    }
}
