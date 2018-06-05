<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//frontend\assets\GeneralAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\PersonalAntiguedad */
/* @var $form yii\widgets\ActiveForm */
?>



  <?php $form = ActiveForm::begin([
    'id' => 'antiguedad-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,

  ]); ?>



    <?= $form->field($model, 'procedencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anos')->textInput() ?>

    <?= $form->field($model, 'meses')->textInput() ?>

    <?= $form->field($model, 'dias')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info  btn-round btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>




    <?php
$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#antiguedad-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                //form.parent().html(result.message);
                $("#modal").modal("toggle");
                $.pjax.reload({container:"#grid-antiguedad"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
?>
