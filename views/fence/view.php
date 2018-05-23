<?php
require 'style.php';
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fence */

$this->title = $model->fence_descricao;
$this->params['breadcrumbs'][] = ['label' => 'Fences', 'url' => ['index']];
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
            <th class="borda" style="width: 25%">Descrição</th>
            <th class="borda" style="width: 25%">Cor</th>
            <th class="borda" style="width: 25%">Borda</th>
            <th class="borda" style="width: 15%">Ações</th>
        </tr>
        <tr>
            <td class="borda"><?= $model->fence_descricao; ?></td>
            <td class="borda glyphicon glyphicon-stop" style="font-size:30px; text-align: center; width: 100%; color:<?=$model->fence_cor; ?>"></td>
            <td class='borda'><?=$model->fence_borda;?></td>

            <td class="borda">
                <table style=" width: 100%">
                    <tr >
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['update', 'id' => $model->fence_id], ['class' => 'glyphicon glyphicon-pencil', 'title' =>     'Alterar']) ?>
                        </th>
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['delete', 'id' => $model->fence_id], [
                                'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                'data' => [
                                    'confirm' => 'Tem certeza de que deseja excluir esta Cerca?',
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
</div>
