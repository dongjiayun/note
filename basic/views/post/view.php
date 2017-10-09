<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\behaviors\AttributeBehavior;
use yii\db\Command;
use app\models\Comment;
use yii\base\Widget;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '博客', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php 
    $user=intval(Yii::$app->user->id);
    $auth=intval($model->auth);
    ?> 
        <?php
              if($user==$auth){?>
             <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
             <?=Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])?>
           <?php }?>  
 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
                        //'auth',
            [
            	'attribute'	=>'auth',
            	'value'=>$model->author->username,
            ],
            'content:ntext',
            //'create_time',
            [
            		'attribute'=>'create_time',
            		'value'=>date("Y-m-d H:i:s",$model->create_time),
            ],
        	[
        		    'attribute'=>'update_time',
        			'value'=>date("Y-m-d H:i:s",$model->update_time),
            ],
        ],
    ]) ?>


  <?php 

  
  ?>
    
 </div>
