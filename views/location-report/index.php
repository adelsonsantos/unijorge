<style>
    table.diaria {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td, th.borda {
        border: 0.5px solid #b5b5b5;
        text-align: left;
        padding: 8px;
    }
    tr.bordaMenu {
        background-color: #cecece;
    }
    tr:nth-child(even) {
        background-color: #ffffff;
    }
    .font-topo {
        font-size: 20px;
        font-weight: bold;
    }
</style>

<?php

use app\models\Fence;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Pesquisar Trajetória', 'url' => ['index']];
?>
<h1 style="text-align: center"><?= "Pesquisar Trajetória" ?></h1>
<div style="position: absolute; margin-top: -52px">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div class="diarias-view" style="margin-left: 209px; margin-top: 53px; ">

<div class="customer-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($model, 'location_data_report_inicio')->textInput(['maxlength' => true])->label('Data Início') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'location_data_report_fim')->textInput(['maxlength' => true])->label('Data Fim') ?>
                    </div>

                    <div class="col-sm-2">
                        <?= $form->field($model, 'device_id')->dropDownList(
                                ArrayHelper::map(\app\models\Device::find()->asArray()->orderBy('device_nome')->all(), 'device_id', 'device_nome'))->label('Dispositivo');
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <table class="diaria" style=" width: 100%">
            <tr class="bordaMenu">
                <th class="borda" style="text-align: center; width: 50%">
                    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
                </th>
                <th class="borda" style="text-align: center; width: 50%">
                    <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
                </th>
            </tr>
        </table>
    </div>
    <?php ActiveForm::end(); ?>
</div>

    <?php
    if(isset($model->device_id)){
       echo Yii::$app->controller->renderPartial('trajetory', ['model' => $model]);
    }?>
</div>
