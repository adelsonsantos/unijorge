<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UnijorgeRaca */

$this->title = 'Cadastrar Raça';
?>
<div class="unijorge-raca-create">
<br>
    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
