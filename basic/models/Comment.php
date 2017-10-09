<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $is_reply
 * @property integer $post_id
 * @property integer $commenter_id
 * @property string $commenter_name
 * @property integer $replied_id
 * @property string $replied_name
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'is_reply', 'post_id', 'commenter_id', 'commenter_name', 'replied_id', 'replied_name'], 'required'],
            [['is_reply', 'post_id', 'commenter_id', 'replied_id'], 'integer'],
            [['content'], 'string', 'max' => 200],
            [['commenter_name', 'replied_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '评论',
            'is_reply' => 'Is Reply',
            'post_id' => 'Post ID',
            'commenter_id' => 'Commenter ID',
            'commenter_name' => 'Commenter Name',
            'replied_id' => 'Replied ID',
            'replied_name' => 'Replied Name',
        ];
    }

}
