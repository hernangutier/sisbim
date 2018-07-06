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

<div class="col-sm-offset-3 col-sm-6">
<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Nuevo Movimiento Especial (Desvinculación de Bienes por Usuario Directo)</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<?php $form = ActiveForm::begin(); ?>
														<!-- <legend>Form</legend> -->
														<fieldset>

                              <?php //-------------- Lineas -------------

                                 echo $form->field($model, 'id_resp')->widget(Select2::classname(), [

                                      'data' => ArrayHelper::map(common\models\Responsables::find()->all(),'id',
                                           function($model, $defaultValue) {
                                              return  $model->cedrif . ' ' . $model->nombres;
                                      }
                              ),
                                      'language' => 'es',

                                      'options' => ['placeholder' => 'Seleccione la Unidad de Origen ...'],
                                      'pluginOptions' => [
                                      'allowClear' => true
                                      ],
                                      'pluginEvents' => [

                                          "select2:select" => "function() {

                                            $.pjax.reload({container: '#grid-bienes-users'}); }",

                                      ],

                                      ]);

                              ?>

                              <?php
                                  $searchModel = new BienesSearch();
                                  $searchModel->id_resp_directo=$model->id_resp;
                                  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                               ?>



                               <?= GridView::widget([
                                 'dataProvider' => $dataProvider,
                                 'responsive'=>true,
                                 'hover'=>true,
                                 'pjax'=>true,
                                 'pjaxSettings'=>[
                                     'neverTimeout'=>true,
                                     'options'=>[
                                       'id'=>'grid-bienes-users',
                                     ],
                                 ],
                                   'columns' => [
                                       ['class' => 'yii\grid\SerialColumn'],






                                       'codigo',
                                       'descripcion',



                                   ],
                               ]); ?>



														</fieldset>

														<div class="form-actions center">

                              <?= Html::submitButton('<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> Guardar y Continuar ' , ['class' =>  'btn btn-sm btn-success' ]  ) ?>


														</div>
													<?php ActiveForm::end(); ?>
												</div>
											</div>
	</div>
  </div>
