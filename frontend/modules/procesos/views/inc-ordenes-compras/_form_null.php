<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\IncOrdenesNulls */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="profile-user-info profile-user-info-striped">
                      <div class="profile-info-row">
                        <div class="profile-info-name"> N° de Orden: </div>

                        <div class="profile-info-value">
                          <span class="editable editable-click" id="username"><?= $model->oc->num  ?></span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Proveedor </div>

                        <div class="profile-info-value">
                          <i class="fa fa-map-marker light-orange bigger-110"></i>
                          <span class="editable editable-click" id="country"><?= $model->oc->prov->razon  ?></span>
                          <span class="editable editable-click" id="city"><?= $model->oc->prov->cedrif  ?></span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Fecha </div>

                        <div class="profile-info-value">
                          <span class="editable editable-click" id="age"><?= $model->oc->fecha  ?></span>
                        </div>
                      </div>

    </div>


    <?php $form = ActiveForm::begin([
        'id' => 'ordenes-nulls-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
    ]); ?>

      <fieldset>

          <?= $form->field($model, 'motivo')->textarea(['rows' => 6]) ?>

      </fieldset>

      <div class="modal-footer">

        <button class="btn btn-white btn-danger btn-bold" data-dismiss="modal">
          <i class="ace-icon fa fa-times red2"></i>
          Cancelar
        </button>

          <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green "></i>Procesar', ['class' => 'btn btn-white btn-success btn-bold pull-right']) ?>
      </div>

    <?php ActiveForm::end(); ?>

    <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#ordenes-nulls-form").on("beforeSubmit", function(e) {
                var form = $(this);
                $.post(
                    form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                  $.pjax.reload({container: "#grid-ordenes"});
                  $("#modal-ordenes-null").modal("hide");

                });
                return false;
            }).on("submit", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
        ');
    ?>
