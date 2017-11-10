<?php

namespace app\controllers;
header("Access-Control-Allow-Origin: *");
session_start();
use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
//     public function behaviors()
//     {
//         return [
//             'access' => [
//                 'class' => AccessControl::className(),
//                 'only' => ['post'],
//                 'rules' => [
//                 		[
//                 		'actions' => ['post'],
//                 		'allow' => false,
//                  		'roles' => ['?'],
//                 		],
//                 ],
//             ],
           
//         ];
//     }

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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
    	$model = new Post();
    	$request=yii::$app->request;
    	$fn=$request->get('fn');
    	if($fn){
    		//$param=$request->get('param');
    		$fn=$this->$fn();
    		return $fn;
    	}
        //$searchModel = new PostSearch();
        $dataProvider = new ActiveDataProvider([
    			'query' => $model->find()->orderBy(['update_time'=>SORT_DESC]),
        		'pagination'=>[
        				'pagesize'=>5,
        		]
       
    ]); 
//         $id=2;
//         $post=$model->findOne(['id'=>$id]);
//         $auth=$post->auth;
//         $user=Yii::$app->user->getId();
//         $auth=$user?$template="{view} {update} {delete}":$template="{view}";
        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	//'template' =>$template,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionSignup(){
    	$model=new SignupForm();
    	if ($model->load(Yii::$app->request->post()) && $model->signup()){
              return $this->goBack();
    	}
    		return $this->render('signup', [
    				'model' => $model,
    		]);
 
    }
    public function actionLogin()
    {  
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
               return $this->goBack();
               //echo json_encode(Yii::$app->user->identity) ;
               //var_dump(Yii::$app->user->identity->username);
               //echo 123321321321321;
        }else{
        return $this->render('login', [
            'model' => $model,
        ]);
       }
    }

    /**
     * Logout action.
     *
     * @return string
     */

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
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
    public function actionAbout()
    {
        return $this->render('about');
    }
    private function login(){
    	$request=yii::$app->request;
    	$model = new LoginForm();
    	$password=$request->get('password');
    	$email=$request->get('email');
    	$model->email=$email;
    	$model->password=$password;
    	$token = $request->get('token');
//     	if($this->checkCode()==false){
//     		$result=array(
//     				'code'=>10002,
//     				'msg'=>'验证码错误',
//     		);
//     		return json_encode($result);
//     	}
    	$query=$model->login();
    	if($query==true){
    		if($token==''){
    			$token = md5(rand(100000,999999));
    			$cache = Yii::$app->cache;
    			$id = Yii::$app->user->identity->id;
    			$username = Yii::$app->user->identity->username;
    			$password = Yii::$app->user->identity->password;
    			$email = Yii::$app->user->identity->email;
    			$info = [
    					'id'=>$id,
    					'username'=>$username,
    					'password' =>$password,
    					'email' =>$email,
    			];
    			$info = json_encode($info);
    			$cache->set($token, $info);
    		}	
    		$result=array(
    				'code'=>0,
    				'msg'=>'成功',
    				'data'=>Yii::$app->user->identity->username,
    				'token'=>$token,
    		);
    	}else{
    		$result=array(
    				'code'=>10001,
    				'msg'=>'邮箱或密码错误',
    		);
    	}
    	return json_encode($result);
    }
    private function signup(){
    	$request=yii::$app->request;
    	$model = new SignupForm();
    	
    }
    private function logout(){
    	$query=Yii::$app->user->logout();
    	if($query==true){
    		$result=array(
    				'code'=>0,
    				'msg'=>'成功',
    		);
    	}else{
    		$result=array(
    				'code'=>10002,
    				'msg'=>'登出失败',
    		);
    	}
    	return json_encode($result);
    }
    
    private function getCode($num=6,$w=90,$h=30) {
	    	$code = "";
	    	for ($i = 0; $i < $num; $i++) {
	    		$code .= rand(0, 9);
	    	}
	    	//4位验证码也可以用rand(1000,9999)直接生成
	    	//将生成的验证码写入session，备验证时用
	    	$_SESSION['vcode'] = $code;
	    	//创建图片，定义颜色值
	    	header("Content-type: image/PNG");
	    	$im = imagecreate($w, $h);
	    	$black = imagecolorallocate($im, 0, 0, 0);
	    	$gray = imagecolorallocate($im, 200, 200, 200);
	    	$bgcolor = imagecolorallocate($im, 255, 255, 255);
	    	//填充背景
	    	imagefill($im, 0, 0, $gray);
	    	
	    	//画边框
	    	imagerectangle($im, 0, 0, $w-1, $h-1, $black);
	    	
	    	//随机绘制两条虚线，起干扰作用
	    	$style = array ($black,$black,$black,$black,$black,
	    			$gray,$gray,$gray,$gray,$gray
	    	);
	    	imagesetstyle($im, $style);
	    	$y1 = rand(0, $h);
	    	$y2 = rand(0, $h);
	    	$y3 = rand(0, $h);
	    	$y4 = rand(0, $h);
	    	imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED);
	    	imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED);
	    	
	    	//在画布上随机生成大量黑点，起干扰作用;
	    	for ($i = 0; $i < 80; $i++) {
	    		imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
	    	}
	    	//将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
	    	$strx = rand(3, 8);
	    	for ($i = 0; $i < $num; $i++) {
	    		$strpos = rand(1, 6);
	    		imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
	    		$strx += rand(8, 12);
	    	}
	    	imagepng($im);//输出图片
	    	imagedestroy($im);//释放图片所占内存
    } 
    
    private function checkCode(){
    	$request=yii::$app->request;
    	$code=$request->get('vcode');
    	$vcode=$_SESSION['vcode']?$_SESSION['vcode']:'';
    	if($code==$vcode){
    		return true;
    	}else{
    	    return false;
    		}
    }
    private function checkLogin(){
    	$request=yii::$app->request;
    	$token = $request->get('token');
    	$cache=Yii::$app->cache;
    	$info = $cache->get($token);
    	if(!$info){
    		$result=array(
    				'code'=>1,
    				'msg'=>'未登录',
    		);
    	}else{
    		$result=array(
    				'code'=>0,
    				'msg'=>'已登录',
    		);
    	}
    	return json_encode($result);
    }
}
