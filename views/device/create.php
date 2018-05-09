<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Device */

$this->title = 'Cadastrar Dispositivo';
$this->params['breadcrumbs'][] = ['label' => 'Dispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-create">

    <h2 style="text-align: center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
