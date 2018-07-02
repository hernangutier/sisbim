<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\DivSemovientes */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'semovientes-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>





    <?= $form->field($model, 'nbov')->textInput(['maxlength' => true]) ?>

    <div class="row">

      <div class="col-sm-6">
        <?= $form->field($model, 'categoria')->dropDownList(
                          [
                            '0'=>  'VACA',
                            '1'=> 'TORO',
                            '2'=> 'BECERRO (A)',
                            '3'=> 'MAUTE (A)',
                            '4'=> 'NOVILLO (A)',

                        ]
                      )


        ?>
      </div>
      <div class="col-sm-6">
        <?= $form->field($model, 'sexo')->dropDownList(
                        ['H'=>'Hembra',
                        'M'=>'Macho',

                        ]
                      )


        ?>
      </div>
    </div>









    <?= $form->field($model, 'observaciones')->textarea(['rows' => 4]) ?>

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
            $("form#semovientes-form").on("beforeSubmit", function(e) {

                var form = $(this);
                $.post(
                    form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                  $.pjax.reload({container: "#grid-semovientes"});
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
