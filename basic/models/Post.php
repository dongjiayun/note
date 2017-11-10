<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $auth
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', ], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'id' => 'ID',
            'title' => '标题',
            'auth' => '作者',
            'content' => '正文',
            'create_time' => '发表时间',
            'update_time' => '最后修改时间',
        	'comment_amount'=>'评论数',
        ];
    }
    public function getAuthor(){
    	return $this->hasOne(User::className(), ['id'=>'auth']);
    }
    public function getComment_count(){
    	$count=$this->hasMany(Comment::className(), ['post_id'=>'id'])->count();
    	return $count;
    }
    public function getShortContent($length=288)
    {
    	$tmpStr = strip_tags($this->content);
    	$tmpLen = mb_strlen($tmpStr);
 
    	$tmpStr = mb_substr($tmpStr,0,$length,'utf-8');
    	return $tmpStr.($tmpLen>$length?'...':'');
    }
    public function get_comment($id){
    	return Comment::find()->where(['post_id'=>$id])->all();
    }
    public function beforeSave($insert){
        	if(parent::beforeSave($insert))
    	{
    		if($insert)
    		{   
    			$user=Yii::$app->user->getId();
    			$auth=$user;
    			$this->create_time = time();
    			$this->update_time = time();
    			if(!$this->auth){
    				$this->auth = $auth;
    			}	
    		}
    		else 
    		{
    			$this->update_time = time();
    		}
    		
    		return true;
    			
    	}
    	else 
    	{
    		return false;
    	}
    }
    public  function getAll(){
    	$db=new \yii\db\Query();
    	$result=$db->select('*')
    	->from('post')
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
}
