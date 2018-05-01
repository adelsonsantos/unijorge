<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fence-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fence_id') ?>

    <?= $form->field($model, 'fence_descricao') ?>

    <?= $form->field($model, 'fence_cor') ?>

    <?= $form->field($model, 'fence_borda') ?>

    <?= $form->field($model, 'fence_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
