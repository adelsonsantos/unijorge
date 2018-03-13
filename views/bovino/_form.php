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

use app\models\UnijorgeRaca;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Bovino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unijorge-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-5">
                        <?= $form->field($model, 'bovino_nome')->textInput(['maxlength' => true])->label('Nome') ?>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'bovino_status')->dropDownList([1 => 'Ativo', 2 => 'Inativo'])->label('Status') ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-5">
                        <?= $form->field($model, 'bovino_idade')->textInput([])->label('Idade') ?>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'raca_id')->dropDownList(

                            ArrayHelper::map(UnijorgeRaca::find()->asArray()->orderBy('raca_nome')->all(), 'raca_id', 'raca_nome'))->label('Raça');
                             ?>
                    </div>
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
    <?php ActiveForm::end(); ?>
</div>


