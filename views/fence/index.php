<style>
    .table.table-striped tbody tr:hover {
        background: #c4e5ff;
    }

    .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
        color: #000000;
        background-color: #dcdedd;
        font-weight: bold;
    }

    a {
        color: #000;
        text-decoration: none;
    }

    a:hover {
        color: #000;
        text-decoration: none;
    }

    .nav-stacked > li + li {
        margin-left: 0;
        font-family: Arial, "Helvetica Neue", Helvetica, Arial, sans-serif;
        border-bottom: 1px solid #dadada;
        border-left: 1px solid #dadada;
        border-right: 1px solid #dadada;
    }

    #itens:hover {
        background-color: #d4d4d4;
    }

    .font-topo {
        font-size: 20px;
        font-weight: bold;
    }

    .grid {
        margin-left: 209px;
    }

    #w0-filters {
        background-color: rgba(220, 222, 221, 0);
    }

    .table thead tr {
        background-color: #dcdedd;
    }

    .tambem {
        text-align: right;
    }

    .font-topo {
        font-size: 20px;
        font-weight: bold;
    }

    .grid {
        margin-left: 209px;
    }

    #w0-filters {
        background-color: rgba(220, 222, 221, 0);
    }

    .table thead tr {
        background-color: #82a3bd;
    }

    .tambem {
        text-align: right;
    }
</style>
<?php

use app\models\Fence;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bovinos';
$this->params['breadcrumbs'][] = $this->title;
?>


<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Cerca</h1>
        <p class="font-topo" style="text-align: center">
            <?= Html::a('Cadastrar Cerca', ['create'], ['class' => 'btn btn-success']); ?>
        </p>
    </div>
    <div class="grid">

        <?php try {
            echo
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'fence_id',
                    'fence_descricao',
                    'fence_cor',
                    [
                        'attribute' => 'fence_cor',
                        'label' => 'Cor',
                        'encodeLabel' => false,
                        'filter'   => Html::activeDropDownList($searchModel, 'fence_cor', ArrayHelper::map(Fence::find()->asArray()->orderBy('fence_id')->all(), 'fence_id', 'fence_cor'), ['class'=>'form-control', 'prompt' => '']),
                        'value' => function($model){ return '';},
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => function ($model, $key, $index, $column) {
                            return ['style' => 'font-size:30px; text-align: center; width: 100%; height: auto; color:'
                                . (!empty($model->fence_cor)
                                    ? $model->fence_cor : 'blue; width: 1000px'),
                                'class' => 'glyphicon glyphicon-stop' ];

                          //  return['<div class="glyphicon glyphicon-stop" style="background-color:'.$model->fence_cor.'"> </div>'];
                        },
                    ],
                    'fence_borda',


                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        } catch (Exception $e) {
        } ?>

    </div>