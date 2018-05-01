<?php

use app\models\FenceCoordenada;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fence */

$this->title = 'Alterar Cerca';
?>
<div class="fence-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelFenceCoord' => (empty($modelFenceCoord)) ? [new FenceCoordenada] : $modelFenceCoord
    ]); ?>

</div>
