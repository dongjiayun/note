<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $name
 */
class Article extends \yii\db\ActiveRecord
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
		$db=new \yii\db\Query();
		$result=$db->select('*')
		->from('article')
		->all();
		return json_encode($result);
	}
	public function getAllCount(){
		$db=new \yii\db\Query();
		$result=$db->select('*')
		->from('article')
		->count();
		return json_encode($result);
	}
}
