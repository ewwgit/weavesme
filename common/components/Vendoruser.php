<?php
namespace common\components;

use Yii;
use yii\base\Component;
use frontend\models\VendorMembership;

class Vendoruser extends Component {
	public $vendorid;
    public $vendorusername;
    public $vendorpassword_hash;
    public $vendorpassword_reset_token;
    public $vendoremail;
    public $vendorauth_key;
    public $vendorstatus;
    public $vendorcreated_at;
    public $vendorupdated_at;
    public $vendorroleId;
    
   
	public function init()
	{
		
	$this->vendorid = \Yii::$app->session->get('user.vendorid');
    $this->vendorusername= \Yii::$app->session->get('user.vendorusername');
    $this->vendorpassword_hash= \Yii::$app->session->get('user.vendorpassword_hash');
    $this->vendorpassword_reset_token= \Yii::$app->session->get('user.vendorpassword_reset_token');
    $this->vendoremail= \Yii::$app->session->get('user.vendoremail');
    $this->vendorauth_key= \Yii::$app->session->get('user.vendorauth_key');
    $this->vendorstatus= \Yii::$app->session->get('user.vendorstatus');
    $this->vendorcreated_at= \Yii::$app->session->get('user.vendorcreated_at');
    $this->vendorupdated_at= \Yii::$app->session->get('user.vendorupdated_at');
    $this->vendorroleId= \Yii::$app->session->get('user.vendorroleId');
   
    
		
		
	}

	public  function RealIP()
	{
		$ent="hello";
		return $ent;
	}
	
	/* public function setuserlogin($vendorid,$vendorusername,$vendorpassword_hash,$vendorpassword_reset_token,$vendoremail,$vendorauth_key,$vendorOtpNumber,$vendorstatus,$vendorcreated_at,$vendorupdated_at,$vendorpassword,$vendorroleId,$vendorcreatedDate,$vendormodifiedDate)
	{
		
		$this->vendorid = $vendorid;
		
		$this->isadminLogin = 1;
		$this->vendorusername= $vendorusername;
		$this->vendorpassword_hash= $vendorpassword_hash;
		$this->vendorpassword_reset_token= $vendorpassword_reset_token;
		$this->vendoremail= $vendoremail;
		$this->vendorauth_key= $vendorauth_key;
		$this->vendorOtpNumber= $vendorOtpNumber;
		$this->vendorstatus= $vendorstatus;
		$this->vendorcreated_at= $vendorcreated_at;
		$this->vendorupdated_at= $vendorupdated_at;
		$this->vendorpassword= $vendorpassword;
		$this->vendorroleId= $vendorroleId;
		$this->vendorcreatedDate= $vendorcreatedDate;
		$this->vendormodifiedDate= $vendormodifiedDate;
		
		$currentMembershipInfo = VendorMembership::find()->where(['vendorId' =>$vendorid ,'activemembeship' =>1])->one();
		if(!(empty($currentMembershipInfo)))
		{
			$this->vendormemId = $currentMembershipInfo['MemId'];
		}
	
	} */

}
