<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\PersonalCarga */
/* @var $form yii\widgets\ActiveForm */
//frontend\assets\GeneralAsset::register($this);
?>





  <?php $form = ActiveForm::begin([
    'id' => 'familiar-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
  ]); ?>



    <?= $form->field($model, 'ced')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parentesco')->dropDownList(
              [   '0'=>'Abuelo (a)',
                  '1'=>'Conyugue',
                  '2'=>'Hermano (a)',
                  '3'=>'Hijo (a)',
                  '4'=>'Madre',
                  '5'=>'Padre'
                ]

                   )


     ?>

    <?= $form->field($model,'fnac')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese la Fecha de Nacimiento ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
        ]
        ])

    ?>

    <?= $form->field($model, 'lugar_nac')->textInput(['maxlength' => true]) ?>

    <?=
      $form->field($model, 'sexo')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'primary',
                'offColor' => 'danger',
                'onText' => 'Masculino',
                'offText' => 'Femenino',
            ]

        ]);
    ?>

    <?= $form->field($model, 'nivel_educ')->dropDownList(
          [
            '0'=> 'No Estudia',
            '1'=> 'Preescolar',
            '2'=> 'Primaria',
            '3'=> 'Secundaria',
            '4'=> 'Diversificado',
            '5'=> 'Técnico Medio',
            '6'=> 'Universitario',
          ]
                   )


     ?>

     <?=
       $form->field($model, 'nacionalidad')->widget(SwitchInput::classname(), [
                 'pluginOptions' => [
                 'size' => 'large',
                 'onColor' => 'primary',
                 'offColor' => 'danger',
                 'onText' => 'Venezolano',
                 'offText' => 'Extranjero',
             ]

         ]);
     ?>

     <?php
     if (!($model->isNewRecord)) {


       echo $form->field($model, 'activo')->widget(SwitchInput::classname(), [
                 'pluginOptions' => [
                 'size' => 'large',
                 'onColor' => 'primary',
                 'offColor' => 'danger',
                 'onText' => 'Activo',
                 'offText' => 'Deshabilitado',
             ]

         ]);
      }
     ?>


    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info  btn-round btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>



    <?php
    $this->registerJs("
        // obtener la id del formulario y establecer el manejador de eventos

            $('form#familiar-form').on('beforeSubmit', function(e) {
                var form = $(this);
                $.post(
                    form.attr('action')+'&submit=true',
                    form.serialize()
                )
                .done(function(result) {
                    //form.parent().html(result.message);
                    $('#modal').modal('toggle');
                    $.pjax.reload({container:'#grid-familia'});
                });
                return false;
            }).on('submit', function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
          ");
    ?>



</div>
