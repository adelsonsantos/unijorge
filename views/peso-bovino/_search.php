<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesoBovinoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peso-bovino-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'peso_id') ?>

    <?= $form->field($model, 'bovino_id') ?>

    <?= $form->field($model, 'peso_peso') ?>

    <?= $form->field($model, 'peso_data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
