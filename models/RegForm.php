<?php

namespace app\models;

use Yii;
use yii\base\Model;


class RegForm extends Model
{
	public $username;
    public $usermail;
    public $userpass;
	public $userpass2;
	public $actcode;
	public $mailcode;
	public $url;
	public $act;
		

    const SCENARIO_BEGIN = 'begin';    
    const SCENARIO_REGISTR = 'registr';    


	
    public function scenarios()
    {
        return [
            self::SCENARIO_BEGIN => ['username','usermail','act','url'],
			self::SCENARIO_REGISTR => ['username','usermail','userpass','userpass2','act','actcode','mailcode','url'],

        ];
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
			[['username', 'usermail'], 'required', 'on' => 'default' ],
            [['username', 'usermail'], 'required', 'on' => self::SCENARIO_BEGIN ],
			[['username', 'usermail','userpass','userpass2','actcode'], 'required', 'on' => self::SCENARIO_REGISTR ],
            ['usermail', 'email'],
            ['userpass', 'string', 'min' => 6],
            ['userpass2', 'compare', 'compareAttribute' => 'userpass'],
			['actcode', 'compare', 'compareAttribute' => 'mailcode'],

			[['usermail', 'userpass', 'userpass2','act','actcode','url'],'safe'],
        ];
    }

	 public function attributeLabels()
  {
    return [
	  'username' => Yii::t('app', 'Имя'),
      'usermail' => Yii::t('app', 'E-mail'),
      'userpass' => Yii::t('app', 'Пароль'),
   
    ];
  }
    
}
