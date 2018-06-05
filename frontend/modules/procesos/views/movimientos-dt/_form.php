<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use common\models\Bienes;
use yii\web\View;
use yii\helpers\ArrayHelper;
$url = \yii\helpers\Url::to(['bienes-list']);
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\MovimientosDt */
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




<div class="movimientos-dt-form">

  <?php $form = ActiveForm::begin([
    'id' => 'detalles-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,

  ]); ?>
     <?php
        $cityDesc = empty($model->id_bien) ? '' : Bienes::findOne($model->id_bien)->description;
      ?>


    <?=
    $form->field($model, 'id_bien')->widget(Select2::classname(), [
        'initValueText' => $cityDesc, // set the initial display text
        'options' => ['placeholder' => 'Buscar Bienes ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Esperando Resultados...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('formatRepo'),
            'templateSelection' => new JsExpression('function (city) { return city.codigo + " " + city.descripcion; }'),
    ],
]);

     ?>

     <?php //-------------- Lineas -------------

        echo $form->field($model, 'id_und_destino')->widget(Select2::classname(), [

             'data' => ArrayHelper::map(common\models\UnidadesAdmin::find()->all(),'id',
                  function($model, $defaultValue) {
                     return $model->descripcion;
             }
     ),
             'language' => 'es',

             'options' => ['placeholder' => 'Seleccione el Destino ...'],
             'pluginOptions' => [
             'allowClear' => true
             ],

             ]);

     ?>





    <?= $form->field($model, 'estado_uso')->textInput() ?>

    <?= $form->field($model, 'estado_fisico')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
