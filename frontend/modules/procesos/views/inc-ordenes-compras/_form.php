<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\Proveedores;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\Response;
use yii\web\JsExpression;
use kartik\editable\Editable;
use yii\web\View;
$url =Url::to(['proveedores-list']);
/* @var $this yii\web\View */
/* @var $model common\models\IncOrdenesCompras */
/* @var $form yii\widgets\ActiveForm */
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
		");
 ?>
<div class="widget-box widget-color-green">
											<div class="widget-header">
												<h4 class="widget-title">Nueva Orden de Compra </h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">

    <?php $form = ActiveForm::begin(); ?>
 <fieldset>
   <?= //-------------- Cargo -------------

      $form->field($model, 'id_prov')->widget(Select2::classname(), [

          //'data' => ArrayHelper::map(common\models\Proveedores::find()->asArray()->all(),'id','razon'),
          'language' => 'es',

          'size' => Select2::LARGE,
        'addon' => [

              'append' => [
								'content' => Html::button('<i class="fa fa-plus"></i>',[
									'id' => 'activity-index-link',
									'class' => 'btn btn-success',
									'title'=>'Nuevo Proveedor',
									'data-toggle' => 'modal-proveedores_create',
									'data-target' => '#modal-proveedores_create',
									'data-url' => Url::to(['proveedores/create-modal']),
									'data-pjax' => '0',
								]),
                  'asButton' => true
              ]
          ],

					'initValueText' => 'Consultar Bienes...',
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
<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model, 'num', [
                  'addon' => ['prepend' => ['content'=>'<i class="fa fa-key"></i>']]
                    ])?>
  </div>

  <div class="col-sm-6">
    <?= $form->field($model,'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese Fecha de la Orden ...'],
    'pluginOptions' => [
        'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
    ]
    ])
    ?>

  </div>
</div>

<?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>



</fieldset>

<div class="form-actions center">
  <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green"></i> Guardar', ['class' => 'btn btn-white btn-success btn-bold']) ?>
</div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
