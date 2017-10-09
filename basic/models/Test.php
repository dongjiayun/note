<?php

namespace app\models;

use Yii;
use app\dao\testDAO;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $name
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }
    public function must($must)
    {
    	return [
    			[[$must], 'required'],
    	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    public  function getAll(){
    	$testDAO=new testDAO();
    	return json_encode($testDAO->getAll());
    }
    public  function getAllCount(){
    	$testDAO=new testDAO();
    	return json_encode($testDAO->getAllCount());
    }
    public  function add($name){
    	$testDAO=new testDAO();
    	return json_encode($testDAO->add($name));
    }
    public  function deleteItem($id){
    	$testDAO=new testDAO();
    	return json_encode($testDAO->deleteItem($id));
    }
    public  function updateItem($id,$name){
    	$testDAO=new testDAO();
    	return json_encode($testDAO->updateItem($id,$name));
    }
    public function getAll0(){
    	return $this->hasMany(test::className(),['id'=>'id','name'=>'name']);
    }
    public function loadMore($currentItem,$number){
    	$query =Yii::$app->db;
    	$userIdentity= Yii::$app->user->identity;
        $userId = $userIdentity?$userIdentity->id:'';
    	$result=$query->createCommand('select * from post where id between :from and 999999999999 and (isPublic = 0 or auth = :userId )limit :limit', [
    			':from' =>$currentItem+1,
    			':limit' =>intval($number),
    			':userId' =>$userId,
    	])->queryAll();
    	return $result;
    }
}
