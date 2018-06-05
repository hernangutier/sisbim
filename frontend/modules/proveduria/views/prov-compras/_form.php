<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;



/* @var $this yii\web\View */
/* @var $model common\models\ProvCompras */
/* @var $form yii\widgets\ActiveForm */
?>




<div class="widget-box widget-color-green">
											<div class="widget-header">
												<h4 class="widget-title">Datos de la Factura</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<?php $form = ActiveForm::begin(); ?>
														<!-- <legend>Form</legend> -->
														<fieldset>

                              <?php //-------------- Lineas -------------

                                 echo $form->field($model, 'id_prov')->widget(Select2::classname(), [

                                      'data' => ArrayHelper::map(common\models\Proveedores::find()->all(),'id',
                                           function($model, $defaultValue) {
                                              return  $model->cedrif . ' ' . $model->razon;
                                      }
                              ),
                                      'language' => 'es',

                                      'options' => ['placeholder' => 'Seleccione el Proveedor ...'],
                                      'pluginOptions' => [
                                      'allowClear' => true
                                      ],

                                      ]);

                              ?>


                                  <?= $form->field($model, 'num_fact', [

                                    'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-barcode"></i>']]
                                      ])?>

                                  <?= $form->field($model,'fecha_fact')->widget(DatePicker::classname(), [
                                  'options' => ['placeholder' => 'Ingrese Fecha de Desincorporación ...'],
                                  'pluginOptions' => [
                                      'autoclose'=>true,
                                      'format'=>'yyyy-mm-dd',
                                  ]
                                  ])
                                  ?>







                              <?= $form->field($model, 'motivo')->textarea(['rows' => 6]) ?>


														</fieldset>


													<?php ActiveForm::end(); ?>
												</div>
											</div>
	</div>
