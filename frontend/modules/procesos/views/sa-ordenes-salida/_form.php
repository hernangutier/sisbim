<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\SaOrdenesSalida;
/* @var $this yii\web\View */
/* @var $model common\models\SaOrdenesSalida */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Nueva Orden de Salida (Bienes Muebles)</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<?php $form = ActiveForm::begin(); ?>
														<!-- <legend>Form</legend> -->
														<fieldset>


															<?= $form->field($model, 'motivo')->dropDownList(
							                                SaOrdenesSalida::getListMotivos()
							                              )
							                ?>





                              <?= $form->field($model, 'motivo_descripcion')->textarea(['rows' => 6]) ?>


														</fieldset>

														<div class="form-actions center">

                              <?= Html::submitButton('<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> Guardar y Continuar ' , ['class' =>  'btn btn-sm btn-success' ]  ) ?>


														</div>
													<?php ActiveForm::end(); ?>
												</div>
											</div>
	</div>
