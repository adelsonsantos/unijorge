<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
use kartik\widgets\FileInput;
use wbraganca\dynamicform\DynamicFormWidget;

?>

    <div id="panel-option-values" class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-check-square-o"></i> Cerca</h3>
        </div>

        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper',
            'widgetBody' => '.form-options-body',
            'widgetItem' => '.form-options-item',
            'min' => 3,
            'insertButton' => '.add-item',
            'deleteButton' => '.delete-item',
            'model' => $modelFenceCoord[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'fence_coord_latitude',
                'fence_coord_longitude'
            ],
        ]); ?>
        <div class="col">
        <table class="table table-bordered table-striped margin-b-none" style="width: 100%">
            <thead style="width: 100%">
            <tr>
                <th style="width: 10%" class="required">Coordenadas</th>
                <th style="width: 10%; text-align: center">Ações</th>
            </tr>
            </thead>
            <tbody class="form-options-body">
            <?php foreach ($modelFenceCoord as $index => $modelCoord): ?>
                <tr class="form-options-item">
                    <td class="vcenter" style="width: 90%">
                        <div class="row">
                            <div class="col-sm-5">
                                <?= $form->field($modelCoord, "[{$index}]fence_coord_latitude")->label('Latitude')->textInput(['maxlength' => 128]); ?>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-5">
                                <?= $form->field($modelCoord, "[{$index}]fence_coord_longitude")->label('Longitude')->textInput(['maxlength' => 128]); ?>
                            </div>
                        </div>
                    </td>
                    <td class="text-center vcenter" style="width: 10%">
                        <div class="row">
                            <button  style="width: auto; height: auto; margin-top: 19px" type="button" class="delete-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td style="text-align: center">
                    <button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> Nova</button>
                </td>
            </tr>
            </tfoot>
        </table>
        </div>
        <?php DynamicFormWidget::end(); ?>
    </div>

<script type="application/javascript">

$(".optionvalue-img").on("filecleared", function(event) {
    var regexID = /^(.+?)([-\d-]{1,})(.+)$/i;
    var id = event.target.id;
    var matches = id.match(regexID);
    if (matches && matches.length === 4) {
        var identifiers = matches[2].split("-");
        $("#optionvalue-" + identifiers[1] + "-deleteimg").val("1");
    }
});

var fixHelperSortable = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$(".form-options-body").sortable({
    items: "tr",
    cursor: "move",
    opacity: 0.6,
    axis: "y",
    handle: ".sortable-handle",
    helper: fixHelperSortable,
    update: function(ev){
        $(".dynamicform_wrapper").yiiDynamicForm("updateContainer");
    }
}).disableSelection();

</script>