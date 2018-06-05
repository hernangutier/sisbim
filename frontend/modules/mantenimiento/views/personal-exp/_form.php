<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
//frontend\assets\GeneralAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\PersonalExp */
/* @var $upload common\models\Uppload */
/* @var $form yii\widgets\ActiveForm */
?>



  <?php $form = ActiveForm::begin([
    'id' => 'form-folio',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
    'options' => ['enctype' => 'multipart/form-data'],
  ]); ?>








    <?= $form->field($model, 'folio')->textInput() ?>
    <?php //-------------- Contactos -------------

        echo $form->field($model, 'id_tipo')->widget(Select2::classname(), [

           'data' => ArrayHelper::map(common\models\RefTipoDocumentos::find()->asArray()->all(),'id','denominacion'),
             'language' => 'es',

             'options' => ['placeholder' => 'Seleccione el Tipo de Documento'],
             'pluginOptions' => [
             'allowClear' => true
             ],

             ]);

     ?>
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>


    <div class='form-group'>
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info  btn-round btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?php
        $this->registerJs("
        $('#user-profile-3')
      .find('input[type=file]').ace_file_input({
        style:'well',
        btn_choose:'Change avatar',
        btn_change:null,
        no_icon:'ace-icon fa fa-picture-o',
        thumbnail:'large',
        droppable:true,

        allowExt: ['jpg', 'jpeg', 'png', 'gif'],
        allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
      })
      .end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
    //  $('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);

        ");

     ?>

     <?php
        $this->registerJs("
        jQuery(document).ready(function($){
           $(document).ready(function () {

              $('body').on('beforeSubmit', 'form#form-folio', function(e) {
                var form = $(this);
                var cadena= form.serialize();

                $.post(
                    form.attr('action') +'&submit=true',
                    form.serialize()
                )
                .done(function(result) {
                    //form.parent().html(result.message);
                    $('#modal').modal('toggle');
                    $.pjax.reload({container:'#grid-folio-id'});
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
