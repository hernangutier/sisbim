<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\Select2;
use yii\bootstrap\Modal;
use yii\web\Response;
use yii\helpers\Url;
use yii\web\View;
use yii\web\JsExpression;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
$url =Url::to(['bienes-list']);

/* @var $this yii\web\View */
/* @var $model common\models\ProvCompras */

$this->title = 'Administrar Compra: ' . $model->ref;

$this->params['breadcrumbs'][] = $this->title;
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


<?php
$this->registerJs("
jQuery(document).ready(function($){
	$(document).ready(function () {
			//------- Abrir Familiares ----
			$('.add').click(function (){


          alert(('#select2-w1-container').text());

			 });

		 });
		});
");
 ?>

<?php
//----------- Formulario Modal Unico Universal ----
			Modal::begin([
					'id' => 'modal1',
					'header' => '<h3 class="header blue lighter smaller">
										 <i class="ace-icon fa fa-users smaller-90"></i>
											Form
									 </h3>',


					'footer' => '<a href="#" class="btn btn-white btn-default btn-round" data-dismiss="modal">
											 <i class="ace-icon fa fa-times red2"></i>
											 Cancelar
										 </a>',


			]);

			echo "<div class='well'></div>";

			Modal::end();
?>







<div class="col-sm-10 col-sm-offset-1">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													<i class="ace-icon fa fa-refresh green"></i>
													Compras
												</h3>




												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">N° de Control:</span>
													<span class="red"><?= $model->ref  ?></span>

													<br>
													<span class="invoice-info-label">Fecha:</span>
													<span class="blue">04/04/2014</span>
												</div>

												<div class="widget-toolbar hidden-480">
													<a href="#">
														<i class="ace-icon fa fa-print"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-12">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Información del Movimiento</b>
																</div>
															</div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div>
                                    <ul class="list-unstyled spaced">
                                      <li>
                                        <?php
                                        echo '<label>Proveedor</label><br>';
                                        echo Editable::widget([
                                        'name'=>'id_prov',
                                        'value'=>$model->prov->razon,
                                        'asPopover' => false,
                                        'header' => 'Proveedor',
                                        'format' => Editable::FORMAT_BUTTON,
                                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                        'data'=>ArrayHelper::map(common\models\Proveedores::find()->all(),'id','razon'),
                                        'options' => ['class'=>'form-control', 'prompt'=>'Select province...'],
                                        'editableValueOptions'=>['class'=>'text-danger']
                                        ]);

                                         ?>
                                      </li>

                                      <li>
                                        <?php
                                        echo '<label>Motivo</label><br>';
                                        echo Editable::widget([
                                              'name'=>'motivo',
                                              'asPopover' => false,

                                              'inputType' => Editable::INPUT_TEXTAREA,
                                              'value' => $model->motivo,
                                              'header' => 'Motivo',
                                              'submitOnEnter' => false,
                                              'size'=>'lg',
                                              'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Enter notes...']
                                              ]);
                                         ?>
                                      </li>






                                    </ul>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div>
                                    <ul class="list-unstyled spaced">
                                      <li>
                                        <?php
                                        echo '<label>N° de Factura</label><br>';
                                        echo Editable::widget([
                                            'name'=>'num_fact',
                                            'asPopover' => false,
                                            'value' => $model->num_fact,
                                            'header' => 'N° de Factura',
                                            'size'=>'md',
                                            'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']
                                        ]);

                                         ?>
                                      </li>

                                      <li>
                                        <?php
                                        echo '<label>Motivo</label><br>';
                                        echo Editable::widget([
                                              'name'=>'motivo',
                                              'asPopover' => false,

                                              'inputType' => Editable::INPUT_TEXTAREA,
                                              'value' => $model->motivo,
                                              'header' => 'Motivo',
                                              'submitOnEnter' => false,
                                              'size'=>'lg',
                                              'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Enter notes...']
                                              ]);
                                         ?>
                                      </li>






                                    </ul>
                                  </div>
                                </div>
                              </div>

														</div><!-- /.col -->


													</div><!-- /.row -->


													<div class="row">


													</div>

													<div class="space"></div>



													<div class="hr hr8 hr-double hr-dotted"></div>



															<div class="space-6"></div>
													<div class="form-actions center">
															<button type="button" class="btn btn-sm btn-success">
																Procesar
																<i class="ace-icon fa fa-check icon-on-right bigger-110"></i>
															</button>
														</div>


												</div>
											</div>
										</div>
									</div>
