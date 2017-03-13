<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
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
