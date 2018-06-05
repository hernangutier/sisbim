<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\GvAccesoriosVehiculos */
/* @var $form yii\widgets\ActiveForm */
?>



  <?php $form = ActiveForm::begin([
      'id' => 'accesorios-form',
      'enableAjaxValidation' => true,
      'enableClientScript' => true,
      'enableClientValidation' => true,
  ]); ?>





    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    

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
            $("form#accesorios-form").on("beforeSubmit", function(e) {
                var form = $(this);
                $.post(
                    form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                  $.pjax.reload({container: "#grid-accesorios"});
                  $("#modal-accesorios").modal("hide");

                });
                return false;
            }).on("submit", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
        ');
    ?>
