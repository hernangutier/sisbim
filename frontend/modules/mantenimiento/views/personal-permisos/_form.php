<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalPermisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-permisos-form">

  <?php $form = ActiveForm::begin([
    'id' => 'form-permiso',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,

  ]); ?>


  <?= $form->field($model, 'tipo')->dropDownList(
                   [
                    '0'=>'Enfermedad',
                    '1'=>'Reposo Prenatal',
                    '2'=>'Reposo Postnatal',
                    '3'=>'Muerte de un Familiar',
                    '4'=>'Accidente Laboral',
                    '5'=>'Solicitud de Permiso (Personal)',

                  ]
                 )


   ?>

    <?= $form->field($model,'motivo')->textArea(['rows' => 6]) ?>





    <div class="row">


      <div class="col-xs-6">

            <?= $form->field($model,'fini')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Inicio ...'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format'=>'yyyy-mm-dd',
                ]
                ])

            ?>
    </div>

    <div class="col-xs-6">

          <?= $form->field($model,'fend')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Culminación ...'],
          'pluginOptions' => [
              'autoclose'=>true,
              'format'=>'yyyy-mm-dd',
              ]
              ])

          ?>
    </div>

    </div>

    <div class="row">


      <div class="col-xs-4">

    <?=
      $form->field($model, 'is_remunerable')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'Si',
                'offText' => 'No',
            ]

        ]);
    ?>
  </div>
  <div class="col-xs-4">
    <?=
      $form->field($model, 'is_justificado')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'Si',
                'offText' => 'No',
            ]

        ]);
    ?>
    </div>

    <div class="col-xs-4">
    <?=
      $form->field($model, 'is_dias_laborales')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'Si',
                'offText' => 'No',
            ]

        ]);
    ?>
    </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info  btn-round btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
   $this->registerJs("
   jQuery(document).ready(function($){
      $(document).ready(function () {

         $('body').on('beforeSubmit', 'form#form-permiso', function(e) {
           var form = $(this);
           var cadena= form.serialize();

           $.post(
               form.attr('action') +'&submit=true',
               form.serialize()
           )
           .done(function(result) {
               //form.parent().html(result.message);
               $('#mod-permiso').modal('toggle');
               $.pjax.reload({container:'#grid-permises-id'});
           });
           return false;
       }).on('submit', function(e){
           e.preventDefault();
           e.stopImmediatePropagation();
           return false;
       });
     });
     });
   ");
 ?>
