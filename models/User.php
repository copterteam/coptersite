<?php

namespace app\models;
use yii\db\ActiveRecord;

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
	
	    public function resetPassword()
    {
		if( $this->active == 1){ 
		
		$newpass = generate_password(6);
     
	    $inspass = password_hash($newpass,PASSWORD_BCRYPT);
    
	    $this->userpass = $inspass;
		
        return(  $this->save(false) );
		
		}else{
			
		return(  false );	
		}
    }
}
