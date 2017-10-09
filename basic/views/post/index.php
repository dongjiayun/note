<?php

use yii\helpers\Html;
use yii\grid\GridView;
use Faker\Guesser\Name;
use app\models\Comment;
use yii\widgets\ListView;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '博客';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建博客', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            ['attribute'=>'title',
            'contentOptions'=>['width'=>'200px'],
            ],
            //'content:ntext',
        		['attribute'=>'content',
        		 'value'=>'ShortContent',		
            ],
        		//'auth',
        		[
        		'attribute'	=>'auth',
        		'value'=>'author.username',
        		],    

            [
            		'attribute'=>'create_time',
            		 'format'=>['date','php:Y-m-d H:i:s'],
            ],
        	[
        		    'attribute'=>'update_time',
        			 'format'=>['date','php:Y-m-d H:i:s'],
            ],
        		[
        		'attribute'	=>'comment_amount',
        		'value'=>'comment_count',
        		],
            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view}{update}{delete}',
            		'buttons'=>
            		[
            				'update'=>function($url,$model,$key)
            				{
            					$options=[
            							'title'=>Yii::t('yii', '修改'),
            							'aria-label'=>Yii::t('yii','修改'),
            							'data-method'=>'post',
            							'data-pjax'=>'0',
            					];
            					    $user=intval(Yii::$app->user->id);
                                    $auth=intval($model->auth);
                                    if($user!==$auth){
                                    	return false;
                                    }
            					return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,$options);
            		
            		},
            		'delete'=>function($url,$model,$key)
            		{
            			$options=[
            					'title'=>Yii::t('yii', '删除'),
            					'aria-label'=>Yii::t('yii','删除'),
            					'data-confirm'=>Yii::t('yii','Are you sure to delete this post？'),
            					'data-method'=>'post',
            					'data-pjax'=>'0',
            			];
            			$user=intval(Yii::$app->user->id);
            			$auth=intval($model->auth);
            			if($user!==$auth){
            				return false;
            			}
            			return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,$options);
            		
            		}
            		],
            		
            ],
        ],
    ]); ?>

</div>
