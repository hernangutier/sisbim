<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Bienes;
use common\models\BienesSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model frontend\models\FormDesvincular */
/* @var $form yii\widgets\ActiveForm */
?>

<div class='col-sm-offset-3 col-sm-6'>
<div class='widget-box'>
											<div class='widget-header'>
												<h4 class='widget-title'>Nuevo Movimiento Especial (Desvinculación de Bienes por Usuario Directo)</h4>
											</div>

											<div class='widget-body'>
												<div class='widget-main no-padding'>
													<?php $form = ActiveForm::begin(); ?>
														<!-- <legend>Form</legend> -->
														<fieldset>

                              <?php //-------------- Lineas -------------

                                 echo $form->field($model, 'id_resp')->widget(Select2::classname(), [

                                      'data' => ArrayHelper::map(common\models\Responsables::find()->all(),'id',
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
																							    url: 'script.php',
																							})
																							 .done(function( data, textStatus, jqXHR ) {
																							     if ( console && console.log ) {
																							         console.log( 'La solicitud se ha completado correctamente.' );
																							     }
																							 })
																							 .fail(function( jqXHR, textStatus, errorThrown ) {
																							     if ( console && console.log ) {
																							         console.log( 'La solicitud a fallado: ' +  textStatus);
																							     }
																							});

																						}",

                                      ],

                                      ]);

                              ?>

                            <div class="bienes">
																<table class="table">
																	<thead>
																		<th scope="col"> #</th>
																		<th scope="col">N° de Bien</th>
																		<th scope="col">Descripción</th>
																	</thead>
																	<tbody class="tableBody">
																		<th scope="row">1</th>
															      <td>PGEB-BM-1005</td>
															      <td>COMPUTADOR VIT</td>

																	</tbody>

																</table>
                            </div>



														</fieldset>

														<div class="form-actions center">

                              <?= Html::submitButton("<i class='ace-icon fa fa-arrow-right icon-on-right bigger-110'></i> Guardar y Continuar " , ["class" =>  "btn btn-sm btn-success" ]  ) ?>


														</div>
													<?php ActiveForm::end(); ?>
												</div>
											</div>
	</div>
  </div>
