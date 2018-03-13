<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PesoBovino */

$this->title = $model->peso_id;
$this->params['breadcrumbs'][] = ['label' => 'Peso Bovinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peso-bovino-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->peso_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->peso_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'peso_id',
            'bovino_id',
            'peso_peso',
            'peso_data',
        ],
    ]) ?>

</div>
