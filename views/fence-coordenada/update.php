<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FenceCoordenada */

$this->title = 'Update Fence Coordenada: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Fence Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fence_coord_id, 'url' => ['view', 'id' => $model->fence_coord_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fence-coordenada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
