<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bovino */

$this->title = 'Cadastrar Bovino';
?>
<div class="bovino-create">
    <br>
    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
