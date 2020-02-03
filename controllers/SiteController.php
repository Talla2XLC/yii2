<?php

namespace app\controllers;

use app\components\Bootstrap;
use app\models\ContactForm;
use app\models\Language;
use app\models\LoginForm;
use app\models\RegisterForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\HttpCache;
use yii\filters\PageCache;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller {
	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'cache_about' => [
				'class' => PageCache::class,
				'duration' => 200,
				'only' => ['about'],
			],
			'http_cahce_about' => [
				'class' => HttpCache::class,
				'only' => ['about'],
				'lastModified' => function () {
					return date("Y-m-d");
				},
			],
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions() {
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

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
		return $this->render('index', [
            'userName' => \Yii::$app->user->identity->name,
        ]);
	}

	/**
	 * Login action.
	 *
	 * @return Response|string
	 */
	public function actionLogin() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}

		$model->password = '';
		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Register action.
	 *
	 * @return Response|string
	 */
	public function actionRegister() {
		$model = new RegisterForm();
		if ($model->load(Yii::$app->request->post()) && $model->register()) {
			return $this->render('register_success');
		}

		$model->password = '';
		return $this->render('register', [
			'model' => $model,
		]);
	}

	/**
	 * Logout action.
	 *
	 * @return Response
	 */
	public function actionLogout() {
		Yii::$app->user->logout();
        Language::startSession();
        Language::setRuLang();

		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return Response|string
	 */
	public function actionContact() {
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}
		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout() {
		return $this->render('about');
	}
}
