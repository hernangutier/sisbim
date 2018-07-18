<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Bienes;
use common\models\BienesSearch;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use yii\web\JsExpression;



/* @var $this yii\web\View */
/* @var $model frontend\models\FormDesvincular */
/* @var $form yii\widgets\ActiveForm */

?>

<?php
		echo Dialog::widget();
?>



<?php
$this->registerJs('
		// obtener la id del formulario y establecer el manejador de eventos

				$("#desvincular-form").on("submit", function(e) {

					if ($("#formdesvincular-motivo").val().length <=0) {
						krajeeDialog.alert("Debe indicar el Motivo");
						return 0;
					}


		      if (!($("#formdesvincular-id_resp").val()>0)) {
						krajeeDialog.alert("Debe seleccionar un responsable...");
						return 0;
					};




					krajeeDialog.confirm("Esta seguro de procesar el Movimiento  ", function (result) {
							 if (result) {

								 // enivamos por peticion por ajax -----

								 $.ajax({
										 // En data puedes utilizar un objeto JSON, un array o un query string
										 data: {"id" : $("#formdesvincular-id_resp").val(),
										 "motivo": $("#formdesvincular-motivo").val() },
										 //Cambiar a type: POST si necesario
										 type: "GET",
										 // Formato de datos que se espera en la respuesta
										 dataType: "json",
										 // URL a la que se enviará la solicitud Ajax
										 url: "index.php?r=procesos%2Fmovimientos%2Fdesvincular-save",
								 })
									.done(function( data, textStatus, jqXHR ) {
									 alert ("Guardo");
									})
									.fail(function( jqXHR, textStatus, errorThrown ) {
											alert("fallo");
								 });



							 } else {
								 alert ("no");
								 e.preventDefault();
							 }
						})

				});
		');
?>

<div class='col-sm-offset-3 col-sm-6'>
<div class='widget-box'>
											<div class='widget-header'>
												<h4 class='widget-title'>Nuevo Movimiento Especial (Desvinculación de Bienes por Usuario Directo)</h4>
											</div>

											<div class='widget-body'>
												<div class='widget-main no-padding'>
													<?php $form = ActiveForm::begin([
												      'id' => 'desvincular-form',
															'enableAjaxValidation' => true,
												      'enableClientScript' => true,
												      'enableClientValidation' => true,

												  ]); ?>
														<!-- <legend>Form</legend> -->
														<fieldset>
															<?php
																	$url=Url::to(['responsables/bienes']);
															 ?>
                              <?php //-------------- Lineas -------------

                                 echo $form->field($model, 'id_resp')->widget(Select2::classname(), [

                                      'data' => ArrayHelper::map(common\models\Responsables::find()->andWhere(['activo'=>1])->all(),'id',
                                           function($model, $defaultValue) {
                                              return  $model->cedrif . ' ' . $model->nombres . ' ' . $model->apellidos;
                                      }
                              ),
                                      'language' => 'es',

                                      'options' => ['placeholder' => 'Seleccione la Unidad de Origen ...'],
                                      'pluginOptions' => [
                                      'allowClear' => true
                                      ],
                                      'pluginEvents' => [

                                          'select2:select' => "function() {
																								//---- Iniciamos una Peticion Ajax ---

																							$.ajax({
																							    // En data puedes utilizar un objeto JSON, un array o un query string
																							    data: {'id' : $(this).val()},
																							    //Cambiar a type: POST si necesario
																							    type: 'GET',
																							    // Formato de datos que se espera en la respuesta
																							    dataType: 'json',
																							    // URL a la que se enviará la solicitud Ajax
																							    url: '$url',
																							})
																							 .done(function( data, textStatus, jqXHR ) {
																								 var items=[];
																							 $('.tb').empty();
																							 $.each(data,function (key,val){
																								 items.push('<tr>');
																								 items.push('<td>' + val.codigo + '</td>');
																								 items.push('<td>' + val.descripcion + '</td>');
																								 items.push('</tr>');

																							 });

																							 $('<tbody/>',{'class': 'tb', 'html' : items.join('')}).appendTo($('.table'));
																							 })
																							 .fail(function( jqXHR, textStatus, errorThrown ) {
																							     if ( console && console.log ) {
																							         alert( 'La solicitud a fallado: ' +  textStatus);
																							     }
																							});

																						}",

                                      ],

                                      ]);

                              ?>

															<?= $form->field($model, 'motivo')->textarea(['rows' => 4]) ?>

                            <div class="bienes">
																<table  class="table">
																	<thead>
																		<th scope="col"> #</th>
																		<th scope="col">N° de Bien</th>
																		<th scope="col">Descripción</th>
																	</thead>

																	<tbody>

																	</tbody>



																</table>
                            </div>



														</fieldset>

														<div class="form-actions center">

                              <?= Html::submitButton("<i class='ace-icon fa fa-check icon-on-right bigger-110'></i> Registrar Movimiento " , ["class" =>  "btn btn-sm btn-success" ]  ) ?>


														</div>
													<?php ActiveForm::end(); ?>
												</div>
											</div>
	</div>
  </div>
