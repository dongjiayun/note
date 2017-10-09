<?php

namespace app\dao;
header("Access-Control-Allow-Origin: *");
use Yii;
use app\models\Test;


class testDAO extends \yii\db\ActiveRecord{
	public static function tableName()
	{
		return 'test';
	}
	public  function getAll(){
		$db=new \yii\db\Query();
		$result=$db->select('*')
		->from('test')
		->all();
		return $result;
	}
	public function getAllCount(){
		$db=new \yii\db\Query();
		$result=$db->select('*')
		->from('test')
		->count();
		return $result;
	}
	public  function add($name){
	    $item=new test;
	    $item->name = $name;
	    $query=$item->save();
		if($query){
			$result=0;
		}else{
			$result=1;
		}
		return $result;
	}
	public  function deleteItem($id){
		$item=Test::findOne($id);
		if($item){
			$query=$item->delete();
			if($query){
				$result=0;
			}else{
				$result=1;
			}
		}else{
			$result=3;
		}
		//var_dump($item);die;
		return $result;
	}
	public  function updateItem($id,$name){
		$item=Test::findOne($id);
		if($item){
			$item->name=$name;
			$query=$item->update();
			if($query){
				$result=0;
			}else{
				$result=1;
			}
		}else{
			$result=3;
		}
		//var_dump($item);die;
		return $result;
	}
}