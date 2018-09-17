<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\SaDesincBmMaster */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Nueva Propuesta de Enajenación</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<?php $form = ActiveForm::begin(); ?>
														<!-- <legend>Form</legend> -->
														<fieldset>

                              <?php //-------------- Lineas -------------

                                 echo $form->field($model, 'id_conc')->widget(Select2::classname(), [

                                      'data' => ArrayHelper::map(common\models\SaDesincConceptos::find()->all(),'id',
                                           function($model, $defaultValue) {
                                              return  $model->codigo . ' ' . $model->descripcion;
                                      }
                              ),
                                      'language' => 'es',

                                      'options' => ['placeholder' => 'Seleccione el Concepto Pub. 21 ...'],
                                      'pluginOptions' => [
                                      'allowClear' => true
                                      ],

                                      ]);

                              ?>






                              <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>


														</fieldset>

														<div class="form-actions center">

                              <?= Html::submitButton('<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> Guardar y Continuar ' , ['class' =>  'btn btn-sm btn-success' ]  ) ?>


														</div>
													<?php ActiveForm::end(); ?>
												</div>
											</div>
	</div>
