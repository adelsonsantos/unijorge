<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FenceCoordenadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fence-coordenada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fence_coord_id') ?>

    <?= $form->field($model, 'fence_id') ?>

    <?= $form->field($model, 'fence_coord_latitude') ?>

    <?= $form->field($model, 'fence_coord_longitude') ?>

    <?= $form->field($model, 'fence_coord_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
