<style>
    .table.table-striped tbody tr:hover
    {
        background: #c4e5ff;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        color: #000000;
        background-color: #dcdedd;
        font-weight: bold;
    }
    /*  .nav-pills>li>a {
          border-radius: 0px;
      }*/
    a {
        color: #000;
        text-decoration: none;
    }
    a:hover {
        color: #000;
        text-decoration: none;
    }
    .nav-stacked>li+li {
        margin-left: 0;
        font-family: Arial, "Helvetica Neue", Helvetica, Arial, sans-serif;
        border-bottom:1px solid #dadada;
        border-left:1px solid #dadada;
        border-right:1px solid #dadada;
    }
    #itens:hover {
        background-color: #d4d4d4;
    }
    .font-topo{
        font-size: 20px;
        font-weight: bold;
    }
    .grid{
        margin-left: 209px;
    }

    #w0-filters{
        background-color: rgba(220, 222, 221, 0);
    }
    .table thead tr{
        background-color: #82a3bd;
    }
    .tambem {
        text-align: right;
    }
</style>
<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnijorgeUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raça Bovinos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:75px;">

<div>
    <h1 class="font-topo" style="text-align: center">Raça Bovinos</h1>
    <p class="font-topo" style="text-align: center">
        <?= Html::a('Cadastrar Raça', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
</div>
    <div class="grid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'raca_id',
            'raca_nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
