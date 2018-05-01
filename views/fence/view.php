<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fence */

$this->title = $model->fence_id;
$this->params['breadcrumbs'][] = ['label' => 'Fences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fence-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fence_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fence_id], [
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
            'fence_id',
            'fence_descricao',
            'fence_cor',
            'fence_borda',
            'fence_status',
        ],
    ]) ?>

</div>
