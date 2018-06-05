<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProvComprasDt */
/* @var $form yii\widgets\ActiveForm */
?>




<div class="detalle">

  <?php $form = ActiveForm::begin([
      'id' => 'compra-dt-form',
      'enableAjaxValidation' => true,
      'enableClientScript' => true,
      'enableClientValidation' => true,
  ]); ?>

  <div class="profile-user-info profile-user-info-striped">
  												<div class="profile-info-row">
  													<div class="profile-info-name"> Referecia </div>

  													<div class="profile-info-value">
  														<span class="editable editable-click" id="username"><?= $model->idArt->ref ?></span>
  													</div>
  												</div>

  												<div class="profile-info-row">
  													<div class="profile-info-name"> Descripcion </div>

  													<div class="profile-info-value">
  														<span class="editable editable-click" id="city"><?= $model->idArt->descripcion ?></span>
  													</div>
  												</div>

                          <div class="profile-info-row">
  													<div class="profile-info-name"> Cantidad Pedida </div>

  													<div class="profile-info-value">
  														        <?= $form->field($model, 'cnt_pedida')->textInput()->label(false) ?>
  													</div>
  												</div>

                          <div class="profile-info-row">
  													<div class="profile-info-name"> Cantidad Recibida </div>

  													<div class="profile-info-value">
  														        <?= $form->field($model, 'cnt')->textInput()->label(false) ?>
  													</div>
  												</div>







  											</div>







                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Show' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>


    <?php ActiveForm::end(); ?>
</div>


<?php
$this->registerJs("
// obtener la id del formulario y establecer el manejador de eventos
$('form#compra-dt-form').on('beforeSubmit', function(e) {

   var form = $(this);
   $.post(
       form.attr('action')+'&submit=true',
       form.serialize()
   )
   .done(function(result) {

        $.compras.add(result);
       //form.parent().parent().parent().parent().html(result.ref);
       //$.pjax.reload({container:'#solicitante-grid'});
   });
   return false;
}).on('submit', function(e){
   e.preventDefault();
   e.stopImmediatePropagation();
   return false;
});
"

);
 ?>
