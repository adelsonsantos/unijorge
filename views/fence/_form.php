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
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model app\models\Fence */
/* @var $modelFenceCoord app\models\FenceCoordenada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'validateOnChange' => true,
        'validateOnBlur' => false,
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
                        <?= $form->field($model, 'fence_descricao')->textInput(['maxlength' => true])->label('Descrição') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'fence_cor')->widget(ColorInput::classname(), [
                            'options' => ['placeholder' => 'Select color ...'],
                        ])->label('Cor');?>
                    </div>
                    <div class="col-sm-2">
                        <?= $form->field($model, 'fence_borda')->input('number', ['min' => 0, 'max' => 1000]) ->label('Borda') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'fence_status')->dropDownList([1 => 'Ativo', 2 => 'Inativo'])->label('Status') ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

    <?= $this->render('_form_fence_coords', [
        'form' => $form,
        'model' => $model,
        'modelFenceCoord' => $modelFenceCoord
    ]) ?>

   <!-- <div class="form-group">
        <?/*= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) */?>
    </div>-->
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