<?php
require 'style.php';

use app\models\Bovino;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PesoBovino */

$this->title = Bovino::find()->asArray()->where(['bovino_id' => $model->bovino_id])->all()[0]['bovino_nome'];
$this->params['breadcrumbs'][] = ['label' => 'Peso Bovinos', 'url' => ['index']];
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
            <th class="borda" style="width: 25%">Bovino</th>
            <th class="borda" style="width: 25%">Peso</th>
            <th class="borda" style="width: 10%">Data</th>
            <th class="borda" style="width: 15%">Ações</th>
        </tr>
        <tr>

            <td class='borda'><?= Bovino::find()->asArray()->where(['bovino_id' => $model->bovino_id])->all()[0]['bovino_nome']; ?></td>
            <td class="borda"><?= $model->peso_peso; ?></td>
            <td class="borda"><?php try { echo Yii::$app->formatter->asDate($model->peso_data, 'd/MM/Y');
                } catch (\yii\base\InvalidConfigException $e) {
                }; ?></td>

           <td class="borda">
                <table style=" width: 100%">
                    <tr >
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['update', 'id' => $model->peso_id], ['class' => 'glyphicon glyphicon-pencil', 'title' =>     'Alterar']) ?>
                        </th>
                        <th style="text-align: center; width: 33%">
                            <?= Html::a('', ['delete', 'id' => $model->peso_id], [
                                'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                'data' => [
                                    'confirm' => 'Tem certeza de que deseja excluir este Peso?',
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
