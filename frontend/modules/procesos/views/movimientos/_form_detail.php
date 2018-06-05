<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\MovimientosDtSearch;
use yii\grid\GridView;
use common\models\Helpers;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\Response;
use yii\web\View;
use yii\web\JsExpression;
$url =Url::to(['bienes-list','id_und'=>$model->id_und_origen]);

/* @var $this yii\web\View */
/* @var $model common\models\Movimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<?php



$formatJs = <<< 'JS'
var formatRepo = function (city) {
  if (city.loading) {
      return city.descripcion;
  }
  var markup =
'<div class="row">' +
  '<div class="col-sm-3">' +
    '<span class="badge badge-default"><b/>' + city.codigo + '</span>' +
  '</div>' +
  '<div class="col-sm-6">' +

      '<b style="margin-left:5px">' + city.descripcion + '</b>' +
  '</div>' +

  '<div class="col-sm-3">' +

      '<b style="margin-left:5px">' + city.asignacion + '</b>' +
  '</div>' +

'</div>';

  return '<div style="overflow:hidden;">' + markup + '</div>';
};
JS;

$this->registerJs($formatJs, View::POS_HEAD);




 ?>



 <div class="row">

 </div>
<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Bienes Agregados</h4>



													<span class="widget-toolbar">




                          </span>
												</div>

												<div class="widget-body">
													<?php
														 $cityDesc = empty($model->id_bien) ? '' : Bienes::findOne($model->id_bien)->description;
													 ?>







													<div class="widget-main">

														<?=

														Select2::widget([
																'name' => 'kv-repo-template',
																'value' => '14719648',
																'initValueText' => 'kartik-v/yii2-widgets',
																'options' => ['placeholder' => 'Search for a repo ...'],
                                'size' => Select2::MEDIUM,
                                'addon' => [

                                    'append' => [
                                        'content' => Html::button('<i class="fa fa-plus"></i>', [
                                            'class' => 'btn btn-primary add',
                                            'title' => 'Agregar Bien',
                                            'data-toggle' => 'tooltip'
                                        ]),
                                        'asButton' => true
                                    ]
                                ],
																'pluginOptions' => [
																		'allowClear' => true,
																		'minimumInputLength' => 1,
																		'ajax' => [
																				'url' => $url,
																				'dataType' => 'json',
																				'delay' => 250,
																				'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),

																		],
																		'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
																	 'templateResult' => new JsExpression('formatRepo'),
																	 'templateSelection' => new JsExpression('function (city) { return city.codigo + " " + city.descripcion; }'),
																],
														]);




														?>


                          <?php
                              $searchModel = new MovimientosDtSearch();
                              $searchModel->id_mov=$model->id;
                              $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                          ?>

                          <?= GridView::widget([
                              'dataProvider' => $dataProvider,
                              'filterModel' => $searchModel,
                              'columns' => [
                                  ['class' => 'yii\grid\SerialColumn'],


                                  ['attribute'=>'id_bien',
                                    'label'=>'N°. de Bien ',
                                    'value'=>function($searchModel){
                                      return $searchModel->idBien->codigo;
                                    },
                                  ],

                                  ['attribute'=>'id_bien',
                                    'label'=>'Descripción ',
                                    'value'=>function($searchModel){
                                      return $searchModel->idBien->descripcion;
                                    },
                                  ],

                                  ['attribute'=>'id_user_old',
                                    'label'=>'Usuario Anterior',
                                    'value'=>function($searchModel){
                                      return (is_null($searchModel->idUserOld) ? 'No Asignado' : Helpers::setTextColor(3,$searchModel->idUserOld->getNombreCompleto()));
                                    },
																		'format'=>'raw',
                                  ],
                                  ['attribute'=>'id_user_new',
                                    'label'=>'Usuario Nuevo',
                                    'value'=>function($searchModel){
                                      return (is_null($searchModel->idUserNew) ? 'No Asignado' : Helpers::setTextColor(2,$searchModel->idUserNew->getNombreCompleto()));
                                    },
																		'format'=>'raw',
                                  ],

																	['attribute'=>'id_und_destino',
                                    'label'=>'Destino',
                                    'value'=>function($searchModel){
                                      return (is_null($searchModel->idUndDestino) ? 'No Asignado' : Helpers::setTextColor(2,$searchModel->idUndDestino->descripcion));
                                    },
																		'format'=>'raw',
                                  ],

                                  // 'estado_uso',
                                  // 'estado_fisico',
                                  // 'id_und_destino',


                              ],
                          ]); ?>






														</div>
													</div>
												</div>
