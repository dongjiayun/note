<?php

namespace app\controllers;
header("Access-Control-Allow-Origin: *");
use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        		            'access' => [
        		                'class' => AccessControl::className(),
        		                'only' => ['index','create','view','update'],
        		                'rules' => [
        		                		[
        		                		'actions' => ['index','create','view','update'],
        		                		'allow' => true,
        		                 		'roles' => ['@'],
        		                		],
        		                		[
        		                		'actions' => ['index'],
        		                		'allow' => true,
        		                		'roles' => ['?'],
        		                		],
        		                ],
        		            ],        		
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */

    
    public function _access($id){
    	$post=new Post();
    	$post=$post->findOne(['id'=>$id]);
    	$auth=$post->auth;
    	$user=Yii::$app->user->getId();
    	//echo json_encode([$auth,$user]);die;
    	if($auth!=$user){
    	return $this->goBack();
    	//echo json_encode([$auth,$user]);die;
    	}
    }
    public function actionIndex()
    {   
    	$model = new Post();
    	$request=yii::$app->request;
    	$fn=$request->get('fn');
    	if($fn){
    		$fn=$this->$fn();
    		return $fn;
    	}
    	if(Yii::$app->user->isGuest){
    		$login_model=new LoginForm();
    		return $this->render("/site/login",[
    				'model'=>$login_model
    		]);
    	}
    	
        $searchModel = new PostSearch();
        $dataProvider = new ActiveDataProvider([
    			'query' => $model->find()->orderBy(['update_time'=>SORT_DESC]),
    			'pagination' => [
                'pagesize' => '10',
         ],
    ]); 
//         $id=2;
//         $post=$model->findOne(['id'=>$id]);
//         $auth=$post->auth;
//         $user=Yii::$app->user->getId();
//         $auth=$user?$template="{view} {update} {delete}":$template="{view}";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	//'template' =>$template,
        ]);
    }
    public function getAll(){
    	$model = new Post();
    	$query=$model->getAll();
    	$total=$model->getAllCount();
    	if($query){
    		$result=array(
    				'code'=>0,
    				'msg'=>'成功',
    				'total'=>$total,
    				'info'=>$query,
    		);
    	}else{
    		$result=array(
    				'code'=>999,
    				'msg'=>'失败',
    		);
    	}
    	return json_encode($result);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
    	$this->_access($id);
        $model = $this->findModel($id);
   
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {   
    	$this->_access($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
