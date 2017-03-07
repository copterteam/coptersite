<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord  implements \yii\web\IdentityInterface
{

    public $authKey;
    public $accessToken;


  public static function tableName()
  {
    return '{{club_users}}';
  }
  
  
     public static function findIdentity($id)
    {
        return static::findOne(['clid' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }


    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
     
	 return self::findOne(['usermail' => $username]);
	 
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->clid;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

	public function getUserPlace()
    {
    $userPlace = $this->usercity.', '.$this->countryname;
	
	 if( $this->city_status !== 'capital city' ) $userPlace .= ' ( '.$this->region.' )';
		 
	 return $userPlace;
	 
	}
	public function getAvaFile()
    {
  
	
	 if( ! $this->avafile ){ $avatar_file = '/img/noavatar.png';   }else{
		 
		$avatar_file = '/photos/avatars/'.$this->avafile; 
	 }
		 
	 return $avatar_file;
	 
	}
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return( ( $this->active == 1)? password_verify($password,$this->userpass) : false );
    }
	
	
	

private function generate_password($number)

  {

    $arr = array('a','b','c','d','e','f',

                 'g','h','i','j','k','l',

                 'm','n','o','p','r','s',

                 't','u','v','x','y','z',

                 'A','B','C','D','E','F',

                 'G','H','I','J','K','L',

                 'M','N','O','P','R','S',

                 'T','U','V','X','Y','Z',

                 '1','2','3','4','5','6',

                 '7','8','9','0');

    
    $pass = "";

    for($i = 0; $i < $number; $i++)

    {    
      $index = rand(0, count($arr) - 1);

      $pass .= $arr[$index];

    }

    return $pass;

  }


  
  
	    public function resetPassword()
    {
		if( $this->active == 1){ 
		
		$newpass = $this->generate_password(6);
     
	    $inspass = password_hash($newpass,PASSWORD_BCRYPT);
    
	    $this->userpass = $inspass;
		
		 Yii::$app->mailer->compose('remind', ['password' => $newpass])
        ->setTo($this->usermail)
        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['supportName']])
        ->setSubject('Сброс пароля для входа в клуб ' . Yii::$app->name)
        ->send();
		
		
        return(  $this->save(false) );
		
		}else{
			
		return(  false );	
		}
    }
}
