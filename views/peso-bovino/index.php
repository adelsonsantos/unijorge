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

use app\models\Bovino;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesoBovinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peso Bovinos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Peso Bovino</h1>
        <p class="font-topo" style="text-align: center">
            <?= Html::a('Cadastrar Bovino', ['create'], ['class' => 'btn btn-success']); ?>
        </p>
    </div>
    <div class="grid">
        <?php try { echo
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'peso_id',
                    [
                        'attribute'=> 'bovino_id',
                        'value'    => 'bovinos.bovino_nome',
                        'filter'   => Html::activeDropDownList($searchModel, 'bovino_id', ArrayHelper::map(Bovino::find()->asArray()->orderBy('bovino_nome')->all(), 'bovino_id', 'bovino_nome'), array('class'=>'form-control', 'prompt' => ' '))
                    ],
                    'peso_peso',
                    [
                        'attribute' => 'peso_data',
                        'value' => 'peso_data',
                        'format' => ['Date', 'php:d/m/Y'],
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'peso_data',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoUpdateInput' => false,]])
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        } catch (Exception $e) {
        } ?>
    </div>
