<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnijorgeRaca */




?>
<div class="unijorge-raca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
