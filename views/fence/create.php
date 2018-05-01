<?php

use app\models\FenceCoordenada;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fence */

$this->title = 'Cadastrar Cerca';
$this->params['breadcrumbs'][] = ['label' => 'Cercas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelFenceCoord' => (empty($modelFenceCoord)) ? [new FenceCoordenada] : $modelFenceCoord
    ]) ?>

</div>
