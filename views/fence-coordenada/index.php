<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FenceCoordenadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fence Coordenadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fence-coordenada-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fence Coordenada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fence_coord_id',
            'fence_id',
            'fence_coord_latitude',
            'fence_coord_longitude',
            'fence_coord_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
