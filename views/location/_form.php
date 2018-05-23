<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'location_latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_data')->textInput() ?>

    <?= $form->field($model, 'device_id')->textInput() ?>
    <?= $form->field($model, 'location_inside')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
