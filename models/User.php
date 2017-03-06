<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord  implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        
    ];

  public static function tableName()
  {
    return '{{club_users}}';
  }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
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
        return(  password_verify($password,$this->password) );
    }
}
