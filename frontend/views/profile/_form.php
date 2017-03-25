<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Status;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>


    <?= $form->field($model, 'jop')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model , 'status_id')->dropDownList(
            ArrayHelper::map(Status::find()->all(),'id','name'), 
            ['prompt'=>'Select status',
                'style'=>'width:200px !important']
            
            ) ?>
    

    <?= $form->field($model, 'root1')->textInput() ?>

    <?= $form->field($model, 'root2')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
