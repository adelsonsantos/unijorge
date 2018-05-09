<?php
require 'style.php';
use app\models\Bovino;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Device */

$this->title = $model->device_nome;
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
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
            <th class="borda" style="width: 25%">Nome</th>
            <th class="borda" style="width: 25%">Imei</th>
            <th class="borda" style="width: 25%">Bovino</th>
            <th class="borda" style="width: 10%">Ícone</th>
            <th class="borda" style="width: 15%">Ações</th>
        </tr>
        <tr>
            <td class="borda"><?= $model->device_nome; ?></td>
            <td class="borda"><?= $model->device_imei; ?></td>
            <td class='borda'><?= Bovino::find()->asArray()->where(['bovino_id' => $model->bovino_id])->all()[0]['bovino_nome']; ?></td>

            <td class='borda'><?=Html::img($model->device_base.$model->device_icon);?></td>

            <td class="borda">
                <table style=" width: 100%">
                    <tr >
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['update', 'id' => $model->bovino_id], ['class' => 'glyphicon glyphicon-pencil', 'title' =>     'Alterar']) ?>
                        </th>
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['delete', 'id' => $model->bovino_id], [
                                'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                'data' => [
                                    'confirm' => 'Tem certeza de que deseja excluir este Bovino?',
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

