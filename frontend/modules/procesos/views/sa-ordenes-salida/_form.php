<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\SaOrdenesSalida;
use yii\helpers\Url;
use yii\web\View;
use yii\web\Response;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model common\models\SaOrdenesSalida */
/* @var $form yii\widgets\ActiveForm */
$url =Url::to(['resp-list']);
?>

<?php
Modal::begin([
		'id' => 'modal-proveedores_create',
		'header' => '<h4 class="green bigger tl">Nuevo Proveedor</h4>',

]);

echo "<div class='well'></div>";

Modal::end();
?>

<?php
		$this->registerJs("
		$(document).on('click', '#activity-index-link', (function() {

        $.get(

            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal-proveedores_create').modal();
            }
        );
    }));


		$(document).on('click', '#activity-index-link1', (function() {

        $.get(

            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal-proveedores_create').modal();
            }
        );
    }));


		");
 ?>

<?php


//--------------- Script para la Consulta de los Articulos ----
$formatJs = <<< 'JS'
var formatRepo = function (city) {
  if (city.loading) {
      return city.descripcion;
  }
  var markup =
'<div class="row">' +
  '<div class="col-sm-3">' +
    '<h4><b/>' + city.cedrif + '</h4>' +
  '</div>' +
  '<div class="col-sm-9">' +

      '<h4><b style="margin-left:5px">' + city.razon + '</b></h4>' +
  '</div>' +



'</div>';

  return '<div style="overflow:hidden;">' + markup + '</div>';
};
JS;

$this->registerJs($formatJs, View::POS_HEAD);

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


															<div class="btn-toolbar">

																<div class="btn-group">
																											<button class="btn btn-success">Registrar Responsable</button>

																											<button aria-expanded="false" data-toggle="dropdown" class="btn btn-success dropdown-toggle">
																												<span class="ace-icon fa fa-caret-down icon-only"></span>
																											</button>

																											<ul class="dropdown-menu dropdown-success">
																												<li>


																													<?=
																													Html::a('Proveedor', '#', [
																														'id' => 'activity-index-link',

																														'title'=>'Nuevo Proveedor',
																														'data-toggle' => 'modal-proveedores_create',
																														'data-target' => '#modal-proveedores_create',
																														'data-url' => Url::to(['proveedores/create-modal']),
																														'data-pjax' => '0',

																													]);

																													 ?>
																												</li>

																												<li>
																													<?=
																													Html::a('Proveedor', '#', [
																														'id' => 'activity-index-link1',

																														'title'=>'Nuevo Responsable',
																														'data-toggle' => 'modal-proveedores_create',
																														'data-target' => '#modal-proveedores_create',
																														'data-url' => Url::to(['responsables/create-modal']),
																														'data-pjax' => '0',

																													]);

																													 ?>
																												</li>

																												<li>
																													<a href="<?= Url::to(['index']) ?>">Persona Externa</a>
																												</li>

																											</ul>


															</div>




														</div>


															<?=



															Select2::widget([
																'model' => $model,
																'attribute' => 'id_resp',
															    'size' => Select2::LARGE,
															    'initValueText' => 'Seleccionar Responsable...',
															    'options' => ['placeholder' => 'Buscar Bienes'],


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
															       'templateSelection' => new JsExpression('function (city) { return city.cedrif + " " + city.razon; }'),
															    ],





														]);




															?>


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
