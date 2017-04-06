<?php

namespace frontend\modules\vendor\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "vendor_info".
 *
 * @property integer $vendorInfoId
 * @property integer $vendorId
 * @property string $firstName
 * @property string $lastName
 * @property string $telephone
 * @property string $mobile
 * @property string $fax
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $createdDate
 * @property string $updatedDate
 *
 * @property User $vendor
 */
class VendorInfo extends \yii\db\ActiveRecord
{
	public $countriesList;
	public $statesData;
	public $citiesData;
	public $viewProfileImage;
	public $userName;
	public $email;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		[['createdDate', 'updatedDate','vendorId', 'createdBy', 'updatedBy','firstName', 'lastName','telephone', 'mobile', 'fax','countryName','stateName','cityName'], 'safe'],
        		[['companyName','regNumber','mobile'], 'required'],
        		[['mobile'], 'integer'],
            /* [['vendorId'], 'required'],
            [['vendorId', 'createdBy', 'updatedBy'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['firstName', 'lastName'], 'string', 'max' => 200],
            [['telephone', 'mobile', 'fax'], 'string', 'max' => 15],
            [['vendorId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['vendorId' => 'id']], */
        		[['countriesList','statesData','citiesData','country','state','city','address','postalCode','profileImage','companyName','regNumber','viewProfileImage','userName','email'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendorInfoId' => 'Vendor Info ID',
            'vendorId' => 'Vendor ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'telephone' => 'Telephone',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(User::className(), ['id' => 'vendorId']);
    }
    
    public function getuserName($id)
    {
    	$userInfo = User::find()->select(['username'])->where(['id' => $id])->one();
    	return $userInfo->username;
    }
    
    public static function getCitiesByState($stateid)
    {
    	$citiesModel = VendorInfo::find()->select(['city', 'cityName'])->asArray()->where(['state'=>$stateid])
    	->all();
    	$cities = array();
    	for($k=0;$k<count($citiesModel); $k++)
    	{
    		$cities[$k]['id'] = $citiesModel[$k]['city'];
    		$cities[$k]['name'] = $citiesModel[$k]['cityName'];
    	}
    	return $cities;
    }
    
    public static function getVendorsByCity($city)
    {
    	$citiesModel = VendorInfo::find()->select(['vendorId', 'companyName'])->asArray()->where(['city'=>$city])
    	->all();
    	$cities = array();
    	for($k=0;$k<count($citiesModel); $k++)
    	{
    		$cities[$k]['id'] = $citiesModel[$k]['vendorId'];
    		$cities[$k]['name'] = $citiesModel[$k]['companyName'];
    	}
    	return $cities;
    }
    
}
