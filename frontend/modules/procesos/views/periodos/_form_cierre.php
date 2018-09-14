<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\switchinput\SwitchInput;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Periodos */
/* @var $model_close common\models\Periodos */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'form-close',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>


<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Periodo a Cerrar </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?= $model_close->descripcion  ?></span>
													</div>
												</div>

                        <div class="profile-info-row">
													<div class="profile-info-name"> Desde </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="age"><?= $model_close->fini  ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Hasta </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="age"><?= $model_close->fclose  ?></span>
													</div>
												</div>






											</div>

                      <br>
                      <h3 class="header smaller lighter green">
											<i class="ace-icon fa fa-bullhorn"></i>
											Datos de Nuevo Periodo
										</h3>

                    <fieldset>
                    <div class="row">
                      <div class="col-sm-6">
                          <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
                      </div>
                      <div class="col-sm-6">
                        <?= $form->field($model,'fclose')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Ingrese Fecha de Inicio...'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                                        'format'=>'yyyy-mm-dd',
                        ]
                        ])
                        ?>
                      </div>
                    </div>



                    </fieldset>










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
