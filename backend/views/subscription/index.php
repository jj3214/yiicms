<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubscriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<style>
   .subscription-index{
        margin: 0 20px;
   } 
   .create{
     display: flex;
     justify-content: flex-end;
   }
</style>
<div class="subscription-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="create">
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('测试邮件发送', ['test'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('中文邮件发送', ['mail'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('英文邮件发送', ['maile'], ['class' => 'btn btn-success']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email:email',
            'institution',
            'country',
            //'create_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
