<?php
namespace common\components;

use Yii;
use yii\base\Component;

class Customer extends Component {
	public $customerid;
    public $customerusername;
    public $customerpassword_hash;
    public $customerpassword_reset_token;
    public $customeremail;
    public $customerauth_key;
    public $customerstatus;
    public $customercreated_at;
    public $customerupdated_at;
    public $customerroleId;
	public function init()
	{
	$this->customerid = \Yii::$app->session->get('user.customerid');
    $this->customerusername= \Yii::$app->session->get('user.customerusername');
    $this->customerpassword_hash= \Yii::$app->session->get('user.customerpassword_hash');
    $this->customerpassword_reset_token= \Yii::$app->session->get('user.customerpassword_reset_token');
    $this->customeremail= \Yii::$app->session->get('user.customeremail');
    $this->customerauth_key= \Yii::$app->session->get('user.customerauth_key');    
    $this->customerstatus= \Yii::$app->session->get('user.customerstatus');
    $this->customercreated_at= \Yii::$app->session->get('user.customercreated_at');
    $this->customerupdated_at= \Yii::$app->session->get('user.customerupdated_at');
    $this->customerroleId= \Yii::$app->session->get('user.customerroleId');
   
		
	}

	public  function RealIP()
	{
		$ent="hello";
		return $ent;
	}

}
