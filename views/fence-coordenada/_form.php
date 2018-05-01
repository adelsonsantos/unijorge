<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FenceCoordenada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fence-coordenada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fence_id')->textInput() ?>

    <?= $form->field($model, 'fence_coord_latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fence_coord_longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fence_coord_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
