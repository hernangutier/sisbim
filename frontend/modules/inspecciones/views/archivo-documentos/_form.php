<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\helpers\Enum;
/* @var $this yii\web\View */
/* @var $model frontend\models\ArchivoDocumentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivo-documentos-form">

  <?php $form = ActiveForm::begin([
      'id' => 'documentos-form',
      'enableAjaxValidation' => true,
      'enableClientScript' => true,
      'enableClientValidation' => true,
  ]); ?>

  <div class="row">
    <div class="col-sm-6">
      <?php //-------------- Lineas -------------

         echo $form->field($model, 'tipo')->widget(Select2::classname(), [

              'data' => ArrayHelper::map(common\models\ArchivoDocTipos::find()->all(),'id',
                   function($model, $defaultValue) {
                      return $model->descripcion;
              }
      ),
              'language' => 'es',

              'options' => ['placeholder' => 'Seleccione la Linea ...'],
              'pluginOptions' => [
              'allowClear' => true
              ],

              ]);

      ?>
    </div>
    <div class="col-sm-6">
      <?= $form->field($model, 'ano_ejecucion')->dropDownList(
                      Enum::yearList(1900, 2018, true, false)
                    )
      ?>
    </div>
  </div>




    <?= $form->field($model, 'datos_registro')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        //'prefix' => '$ ',

        //'suffix' => ' BsF.',
        'allowNegative' => false
    ]
    ]);
    ?>





    <div class="modal-footer">

      <button class="btn btn-white btn-danger btn-bold" data-dismiss="modal">
        <i class="ace-icon fa fa-times red2"></i>
        Cancelar
      </button>



      <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green "></i>Guardar', ['class' => 'btn btn-white btn-success btn-bold pull-right']) ?>


     </div>


    <?php ActiveForm::end(); ?>

</div>


<?php
$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#documentos-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
              $.pjax.reload({container: "#grid-documentos"});
              $("#modal-documentos").modal("hide");

            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
?>
