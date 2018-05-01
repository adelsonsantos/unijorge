<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FenceCoordenada */

$this->title = 'Create Fence Coordenada';
$this->params['breadcrumbs'][] = ['label' => 'Fence Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fence-coordenada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
