<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm;
    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        	[['confirm'], 'compare', 'compareAttribute' => 'password'],
        	['roleId', 'safe'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->roleId = 2;
        /* $user->save();
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('vendor');
        if($authorRole == NULL)
        {
       
        $author = $auth->createRole('vendor');
        $auth->add($author);
        $authorRole = $auth->getRole('vendor');
        }
       
        $auth->assign($authorRole, $user->getId()); */
        
        return $user->save() ? $user : null;
    }
    
    public function attributeLabels()
    {
    	return [
    			'username' => 'User Name',
    			'confirm' => 'Confirm Password',
    			
    	];
    }
}
