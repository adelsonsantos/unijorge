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
use app\models\Bovino;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesoBovino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unijorge-usuario-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'bovino_id')->dropDownList(ArrayHelper::map(Bovino::find()->asArray()->orderBy('bovino_nome')->all(), 'bovino_id', 'bovino_nome'))->label('Bovino'); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'peso_peso')->textInput()->label('Peso Kg') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, "peso_data")->widget(
                            DatePicker::className(), [
                            'inline' => false,
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])->label('Data') ?>
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

