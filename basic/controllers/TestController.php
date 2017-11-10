<?php

namespace app\controllers;
header("Access-Control-Allow-Origin: *");
use app\models\Test;
use Yii;
use yii\data\ActiveDataProvider;
use app\dao\testDAO;
use app\models\Post;

class TestController extends \yii\web\Controller
{   
	private function signCheck($sign){
		
	}
    public function actionIndex()
    { 
      $request=yii::$app->request;
      $fn=$request->get('fn');
      $fn=$this->$fn();
      return $fn;
    }
    public function view($id){
    	$model=new Test();

    	return $this->render($id
    	,[
    			'param'=>$id,
    			'model'=>$model,
    	]);
    }
    public function getAll(){
    	$model=new Test();
    	$query=json_decode($model->getAll(),1);
    	$total=json_decode($model->getAllCount(),1);
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
    public function add(){
    	$model=new Test();
    	$request=yii::$app->request;
    	$must=array(
    			    'name',
    	);
    	$model->must($must);
    	$name=$request->get('name');
        $result=$model->add($name);
    	$query=json_decode($result,1);
    	if($query==0){
    		$result=array(
    				'code'=>0,
    				'msg'=>'成功',
    		);
    	}else{
    		$result=array(
    				'code'=>999,
    				'msg'=>'失败',
    		);
    	}
    	return json_encode($result);
    }
    public function delete(){
    	$model=new Test();
    	$request=yii::$app->request;
    	$must=array(
    			'id',
    	);
    	$model->must($must);
    	$id=$request->get('id');
//     	$cond=[
//     			'id'=>$id,
//     	];
    	$result=$model->deleteItem($id);
    	$query=json_decode($result,1);
    	if($query==0){
    		$result=array(
    				'code'=>0,
    				'msg'=>'成功',
    		);
    	}elseif($query==3){
    		$result=array(
    				'code'=>998,
    				'msg'=>'该用户不存在',
    		);
    	}else{
    		$result=array(
    				'code'=>999,
    				'msg'=>'失败',
    				);
    	}
    	return json_encode($result);
    }
    public function update(){
    	$model=new Test();
    	$request=yii::$app->request;
    	$must=array(
    			'name',
    			'id',
    	);
    	$model->must($must);
    	$id=$request->get('id');
    	$name=$request->get('name');
    	//     	$cond=[
    	//     			'id'=>$id,
    	//     	];
    	$result=$model->updateItem($id,$name);
    	$query=json_decode($result,1);
    	if($query==0){
    		$result=array(
    				'code'=>0,
    				'msg'=>'成功',
    		);
    	}elseif($query==3){
    		$result=array(
    				'code'=>998,
    				'msg'=>'该用户不存在',
    		);
    	}else{
    		$result=array(
    				'code'=>999,
    				'msg'=>'失败',
    		);
    	}
    	return json_encode($result);
    }
    public function loadMore(){
    	$request=yii::$app->request;
    	$currentItem = $request->get('currentItem');
    	$number = $request->get('number');
    	$token = $request->get('token');
    	$cache = Yii::$app->cache;
    	$id='';
    	$info = $cache->get($token);
    	if($info){
    		$info = json_decode($info);
    		$id = $info->id;
    	}
    	if(!$number){
    		$number=5;
    	}
    	$test = new Test();
    	$result = $test->loadMore($currentItem, $number,$id);
    	if(!$result){
    		$result = array('code'=>1,'msg'=>'缺少参数或查询失败');
    	}else{
    		$result = array('code'=>0,'msg'=>'ok','info'=>$result);
    	}
    	return json_encode($result);
    }
    public function addNote(){
    	$request=yii::$app->request;
    	$content = $request->get('content');
    	$title = $request->get('title');
        $token = $request->get('token');
        $isAccessToken = $this->checkToken($token);
    	if(!$title||!$content){
    		$result = array('code'=>2,'msg'=>'缺少参数');
    		return json_encode($result);
    	}
    	if($isAccessToken==true){
    		$cache = Yii::$app->cache;
    		$info = $cache->get($token);
    		$info = json_decode($info);
    		$id = $info->id;
    		$post = new Post();
    		$post->content = $content;
    		$post->title = $title;
    		$post->auth = $id;
    		$post->save();
    		$result = array('code'=>0,'msg'=>'ok');
    	}else{
    		$result = array('code'=>1,'msg'=>'请登录');
    	}	
    	return json_encode($result);
    }
    public function  updateNote(){
    	$request=yii::$app->request;
    	$content = $request->get('content');
    	$title = $request->get('title');
    	$id = $request->get('id');
    	$user = Yii::$app->user->getId();
    	if(!$id){
    		$result = array('code'=>2,'msg'=>'缺少参数');
    		return json_encode($result);
    	}
    	if($user){
    		$post = Post::findOne($id);
            if($content){
            	$post->content = $content;
            	$post->save();
            }
            if($title){
            	$post->title = $title;
            	$post->save();
            }
            $result = array('code'=>0,'msg'=>'ok');
    	}else{
    		$result = array('code'=>1,'msg'=>'请登录');
    	}	
    	return json_encode($result);
    }
    

    public function test1(){
    	$a=array('a'=>1,'b'=>2);
    	array_unshift($a, 3);
    	return json_encode($a);
    }
    public function getSig($arr)
    {   
    	$arr=array('cmd'=>'stbpublishstatus',
    			'sid'=>1,
    			'stdtype'=>1,
    			'stdid'=>123,
    			'iptvid'=>123,
    			'epg'=>'smchd',
    			'timestamp'=>1436349019083,);
    	ksort($arr);
    	//return json_encode($arr);
    	$key = 123456;
    	array_unshift($arr, $key);
    	//return json_encode($arr);
    	$sig = md5(implode("#", $arr));
    	$sig = strtoupper($sig);
    	return $sig;
    }
    private function checkToken($token){
    	$cache = Yii::$app->cache;
    	$info = $cache->get($token);
    	if($info){
    		return true;
    	}else{
    		return false;
    	}
    }
    
}
