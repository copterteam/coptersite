<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $usermail;
    public $userpass;
	public $url;
	public $act;
		
    public $rememberMe = true;
    private $_user = false;

    const SCENARIO_LOGIN = 'login';    
	const SCENARIO_REMIND = 'remind';
    const SCENARIO_REGISTER = 'register';

	
    public function scenarios()
    {
        return [
            self::SCENARIO_LOGIN => ['usermail', 'userpass','rememberMe','act','url','_user'],
            self::SCENARIO_REMIND => ['usermail','rememberMe','act','url','_user'],
        ];
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
			[['usermail', 'userpass'], 'required', 'on' => 'default' ],
            [['usermail', 'userpass'], 'required', 'on' => self::SCENARIO_LOGIN ],
			
			[['usermail'], 'required', 'on' => self::SCENARIO_REMIND],
			 // email has to be a valid email address
            ['usermail', 'email'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['userpass', 'validatePassword', 'on' => self::SCENARIO_LOGIN],
			[['usermail', 'userpass','act','url','rememberMe'],'safe'],
        ];
    }

	 public function attributeLabels()
  {
    return [
      'usermail' => Yii::t('app', 'E-mail'),
      'userpass' => Yii::t('app', 'Пароль'),
      'rememberMe' => Yii::t('app', 'Запомнить меня'),
   
    ];
  }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
			
            if (!$user || !$user->validatePassword( trim($this->userpass) )) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
			
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
			
        }
        return false;
    }

	
	    public function remind()
    {
        if ($this->validate()) {
			
		$user = $this->getUser();
		
		 if( $user ) return  ( $user-> resetPassword() );
			
        }
        return false;
    }
	
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->usermail);
        }

        return $this->_user;
    }
}
