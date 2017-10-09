<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use Faker\Guesser\Name;

/* @var $this yii\web\View */

$this->title = 'Blog';
// echo json_encode(Yii::$app->user);die;
?>

<div class="site-index">

    <div class="jumbotron">
    <h1>欢迎!</h1>
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
        		    'attribute'=>'update_time',
        			 'format'=>['date','php:Y-m-d H:i:s'],
            ],

        ],
    ]); ?>   
        <?php if(Yii::$app->user->isGuest){?>
        <p>登录获取更多精彩内容</p>
        <?=Html::a("点此登录!","index.php?r=/site/login")?>  
        <?php }else{?>

        <?php }?>
    </div>
</div>
