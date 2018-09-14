<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\DivBienes */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'bienes-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>





    <?= $form->field($model, 'ref')->textInput(['maxlength' => true]) ?>
   <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>



        <?= $form->field($model, 'tipo')->dropDownList(
                          [
                            '0'=>  'VEHICULO',
                            '1'=> 'MAQUINARIA',
                            '2'=> 'IMPLEMENTO',
                            '3'=> 'BIENES MUEBLE EN COMUN',


                        ]
                      )


        ?>

      <div class="row">
      <div class="col-sm-4">
         <?= $form->field($model, 'placa')->textarea(['maxlength' => true]) ?>
      </div>

      <div class="col-sm-4">
         <?= $form->field($model, 'serial_carroceria')->textarea(['maxlength' => true]) ?>
      </div>

      <div class="col-sm-4">
         <?= $form->field($model, 'serial_motor')->textarea(['maxlength' => true]) ?>
      </div>

    </div>

    <?= $form->field($model, 'observacion')->textarea(['rows' => 4]) ?>

    <div class="modal-footer">

      <button class="btn btn-white btn-danger btn-bold" data-dismiss="modal">
        <i class="ace-icon fa fa-times red2"></i>
        Cancelar
      </button>



      <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green "></i>Guardar', ['class' => 'btn btn-white btn-success btn-bold pull-right']) ?>


     </div>

    <?php ActiveForm::end(); ?>

    <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#bienes-form").on("beforeSubmit", function(e) {

                var form = $(this);
                $.post(
                    form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                  $.pjax.reload({container: "#grid-bienes"});
                  $("#modal-semovientes").modal("hide");
                });
                return false;
            }).on("submit", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
        ');
    ?>
