<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\EntesExternos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entes-externos-form">

  <?php $form = ActiveForm::begin([
      'id' => 'entes-form',
      'enableAjaxValidation' => true,
      'enableClientScript' => true,
      'enableClientValidation' => true,
  ]); ?>

  <?= $form->field($model, 'rif', [
    'addon' => ['prepend' => ['content'=>'<i class="fa fa-key"></i>']]
      ])->widget('yii\widgets\MaskedInput', [
      'mask' => 'A-99999999-9'
  ])?>

    <?= $form->field($model, 'razon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textarea(['maxlength' => true]) ?>
    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'telefono', [
          'addon' => ['prepend' => ['content'=>'<i class="fa fa-phone"></i>']]
            ])->widget('yii\widgets\MaskedInput', [
            'mask' =>'(9999)-999-9999',
        ])?>
      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'fax', [
          'addon' => ['prepend' => ['content'=>'<i class="fa fa-fax"></i>']]
            ])->widget('yii\widgets\MaskedInput', [
            'mask' =>'(9999)-999-9999',
        ])?>
      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [

            'name' => 'input-36',
              'clientOptions' => [
                'alias' =>  'email'
              ],
      ]) ?>
      </div>
    </div>






    <div class="modal-footer">



      <button class="btn btn-white btn-danger btn-bold pull-right" data-dismiss="modal">
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
        $("form#entes-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#solicitante-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
?>
