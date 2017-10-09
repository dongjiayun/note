<?php
namespace app\models;

use yii\base\Model;
use app\models\User;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
        	['username', 'unique', 'targetClass' => '\app\models\User', 'message' => '用户名已存在'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => '改邮箱已存在'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        	
        	['password_', 'compare', 'compareAttribute' => 'password','message' => '密码与第一次输入不符'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    
    public function attributeLabels(){
    	return [
    			'email'=>'邮箱',
    			'username'=>'用户名',
    			'password'=>'密码',
    			'password_'=>'请再输入一次密码',
    	];
    }
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
        $user->accessToken=0;
        
        $flag=$user->save() ;
        if($flag){
        	return true;
        }else{
        	return false;
        }
        
    }
}
