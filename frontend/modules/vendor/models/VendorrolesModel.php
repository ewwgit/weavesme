<?php
namespace frontend\modules\vendor\models;

use yii;
use yii\base\Component;
use yii\helpers\Url;
use common\models\User;
/**
 * RolesModel is the model behind the RolesModel.
  *
 */
class VendorrolesModel extends Component
{
	public static function getRole()
	{
		
		if(isset(Yii::$app->vendoruser->vendorid))
		{
		$userExist = User::find()->where( [ 'id' => Yii::$app->vendoruser->vendorid ,'status' => 10] )->exists();
		
		if($userExist != 1)
		{
			\Yii::$app->session->remove('user.vendorid');
			\Yii::$app->session->remove('user.vendorusername');
			\Yii::$app->session->remove('user.vendorpassword_hash');
			\Yii::$app->session->remove('user.vendorpassword_reset_token');
			\Yii::$app->session->remove('user.vendoremail');
			\Yii::$app->session->remove('user.vendorauth_key');
			\Yii::$app->session->remove('user.vendorstatus');
			\Yii::$app->session->remove('user.vendorcreated_at');
			\Yii::$app->session->remove('user.vendorupdated_at');
			\Yii::$app->session->remove('user.vendorroleId');
			
			
		}
		}
	if(isset(Yii::$app->vendoruser->vendorroleId))
		{
			
		$roleId = Yii::$app->vendoruser->vendorroleId;
			
			
		if($roleId)
		{
			return $roleId;
		}
		else
		{
			return $roleId=0;
		}
		
		}
		else {
			return $roleId=0;
		}
		}
		
	
}
