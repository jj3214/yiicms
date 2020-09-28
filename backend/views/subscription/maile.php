<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subscription */

$this->title = 'Maile';
$this->params['breadcrumbs'][] = ['label' => 'Subscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="panel">
    <div class="panel-heading">

        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">

        <div class="subscription-view">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

             <?= $form->field($model, 'filese')->fileInput() ?>


            <?= $form->field($model, 'cpeople')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'interval')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', '发送'), ['class' => 'btn btn-default']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>