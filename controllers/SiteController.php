<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegForm;
use app\models\User;
use app\models\ContactForm;

class SiteController extends Controller
{
		
    /**
     * @inheritdoc
     */
	
	public $loginForm;
	
	
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
				    //'login' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	public function beforeAction($action)
	{
		
	if(Yii::$app->user->isGuest)	$this->loginForm = new LoginForm(['scenario' => LoginForm::SCENARIO_LOGIN]);
		
     return parent::beforeAction($action);	
	}

 
 
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm(['scenario' => LoginForm::SCENARIO_LOGIN]);

        if ( $model->load(Yii::$app->request->post())  ) {
			
		if ( $model->act == 'login' ){ 	
			
			$model->scenario = LoginForm::SCENARIO_LOGIN;
			
			if ( $model->login() )    return $this->goBack();
						
		}
        if ( $model->act == 'remind' ){ 	
		
		 		$model->scenario = LoginForm::SCENARIO_REMIND;

				if ( $model->remind() ) {   	
                
				Yii::$app->session->setFlash('remind','Новый пароль выслан на почту');

				return $this->render('login', [
                        'model' => $model,
                        ]);

				}
		}
		
        }
		
        return $this->render('login', [
            'model' => $model,
        ]);
    }

	   public function actionReg()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
		 $model = new RegForm(['scenario' => RegForm::SCENARIO_BEGIN]);
		 
		     if ( $model->load(Yii::$app->request->post())  ) {
				 
			if ( $model->act == RegForm::SCENARIO_BEGIN ){ 	
					
			
			 if ( $model->validate() ){
				 
				  $model->scenario = RegForm::SCENARIO_REGISTR;

			 $user = User::findByUsername($model->usermail) ? 	User::findByUsername($model->usermail) : User::createUser($model->usermail);  
						
             $model->mailcode = $user->codeActivate();
			 
			 $result =  $model->mailcode ? 'Код активации отправлен на электронную почту' : 'Пользователь с таким адресом e-mail уже зарегистрирован!' ;
			 
			 Yii::$app->session->setFlash('begin',$result);

			    }		
		     } 
			 if ( $model->act == RegForm::SCENARIO_REGISTR ){ 	
			
			 if ( $model->validate() ){
			 
			 $user = User::findByUsername($model->usermail);
			 
			 if( $user->signUp($model->username,$model->userpass)  ) return $this->goHome();
			 
			 	
			 }
			 }
				 
			 }
			 
			 
		return $this->render('reg', [
                        'model' => $model,
                        ]);
	}
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest){
			
			Yii::$app->user->logout();

        return $this->goBack();
		}
		
	return $this->goHome();	
    }


}
