<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\Responsables */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>

<?= ($model->isNewRecord) ? '<div class="widget-box widget-color-green vui-sortable-handle">' : '<div class="widget-box widget-color-blue2 vui-sortable-handle">' ?>
											<div class="widget-header widget-header-small">
												<h5 class="widget-title smaller"><?= ($model->isNewRecord) ? 'Nuevo Responsable' : 'Actualizar Responsable N° de Cedula: ' . $model->cedrif ?></h5>

												<div class="widget-toolbar no-border">
													<ul class="nav nav-tabs" id="myTab">
														<li class="active">
															<a data-toggle="tab" href="#home" aria-expanded="true">Principales</a>
														</li>

														<li class="">
															<a data-toggle="tab" href="#ubicacion" aria-expanded="false">Ubicación</a>
														</li>


														<li class="">
															<a data-toggle="tab" href="#profile" aria-expanded="false">de Adscripción</a>
														</li>


													</ul>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-6">
													<div class="tab-content">
														<div id="home" class="tab-pane active">
                              <?php
                                  echo Yii::$app->controller->renderPartial('basicos',['model'=>$model,'form'=>$form]);
                               ?>
														</div>

														<div id="ubicacion" class="tab-pane">
                              <?php

                                  echo Yii::$app->controller->renderPartial('_ubicacion',['model'=>$model,'form'=>$form]);
                               ?>
														</div>

														<div id="profile" class="tab-pane">
                              <?php

                                  echo Yii::$app->controller->renderPartial('adicionales',['model'=>$model,'form'=>$form]);
                               ?>
														</div>


													</div>
												</div>

                        <div class="widget-toolbox padding-8 clearfix">
                          <div class="form-group">
                              <?= Html::submitButton( ($model->isNewRecord) ? '<i class="ace-icon fa fa-floppy-o bigger-120 green "></i> Guardar' : '<i class="ace-icon fa fa-floppy-o bigger-120  "></i> Guardar' , ['class' => ($model->isNewRecord) ? 'btn btn-white btn-success btn-bold pull-right' : 'btn btn-white btn-primary btn-bold pull-right']  ) ?>
                          </div>
												</div>

											</div>
										<div></div></div>

<?php ActiveForm::end(); ?>
