<?php
namespace app\controllers;
header("Access-Control-Allow-Origin: *");
use app\models\Article;
use Yii;

class ArticleController extends \yii\web\Controller
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
		$model=new Article();
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
	
}
