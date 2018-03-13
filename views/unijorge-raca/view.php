<?php
require 'style.php';
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UnijorgeRaca */

$this->title = "Raça Bovino";
$this->params['breadcrumbs'][] = ['label' => 'Unijorge Racas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div style="position: absolute; margin-top: -30px">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>

<div style="text-align: center">
    <h1 class="font-topo"><?=$this->title;?></h1>
</div>

<div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
    <table class="diaria">
        <tr class="bordaMenu">
            <th class="borda" style="width: 40%">Nome</th>
            <th class="borda" style="width: 40%">Status</th>
            <th class="borda" style="width: 20%">Ações</th>
        </tr>
        <tr>
            <td class="borda"><?= $model->raca_nome; ?></td>
            <?php $status =  $model->raca_status == 0 ? 'Inativo' : 'Ativo'; ?>
                <?= "<td class='borda'>".$status."</td>"; ?>

            <td class="borda">
                <table style=" width: 100%">
                    <tr >
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['update', 'id' => $model->raca_id], ['class' => 'glyphicon glyphicon-pencil', 'title' =>     'Alterar']) ?>
                        </th>
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['delete', 'id' => $model->raca_id], [
                                'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                'data' => [
                                    'confirm' => 'Tem certeza de que deseja excluir esta Raça?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </th>
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', Yii::$app->request->referrer, ['class' => 'glyphicon glyphicon-chevron-left', 'title' => 'voltar']); ?>
                        </th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
