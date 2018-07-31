<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use \kartik\switchinput\SwitchInput;
use yii\web\View;
use yii\web\JsExpression;
use yii\bootstrap\Modal;

$url =Url::to(['entes-list']);


/* @var $this yii\web\View */
/* @var $model common\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
Modal::begin([
		'id' => 'modal-ente_create',
		'header' => '<h4 class="green bigger tl">Registrar Ente Externo</h4>',

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
                $('#modal-ente_create').modal();
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
      return city.razon;
  }
  var markup =
'<div class="row">' +
  '<div class="col-sm-3">' +
    '<h4><b/>' + city.rif + '</h4>' +
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




<div class="bienes-ubicacion">

  <?= //-------------- Cargo -------------

     $form->field($model, 'id_ente_ext')->widget(Select2::classname(), [

         //'data' => ArrayHelper::map(common\models\Proveedores::find()->asArray()->all(),'id','razon'),
         'language' => 'es',

         'size' => Select2::LARGE,
       'addon' => [

             'append' => [
               'content' => Html::button('<i class="fa fa-plus"></i>',[
                 'id' => 'activity-index-link',
                 'class' => 'btn btn-success',
                 'title'=>'Registrar Ente Externo',
                 'data-toggle' => 'modal-ente_create',
                 'data-target' => '#modal-ente_create',
                 'data-url' => Url::to(['entes-externos/create-modal']),
                 'data-pjax' => '0',
               ]),
                 'asButton' => true
             ]
         ],

         'initValueText' => 'Consultar Entes Externos...',
         'options' => ['placeholder' => 'Buscar Entes Externos'],


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
            'templateSelection' => new JsExpression('function (city) { return city.rif + " " + city.razon; }'),
         ],


       ]);

  ?>


<div class="row">
  <div class="col-sm-4">
    <?php

          echo  $form->field($model, 'is_colectivo')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>
  </div>
  <div class="col-sm-4">
    <?php

          echo  $form->field($model, 'sin_user')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>
  </div>



  <div class="col-sm-4">
    <?php

          echo  $form->field($model, 'no_ubicado')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>
  </div>




</div>

<div class="row">



    <div class="col-sm-6">
      <?php

            echo  $form->field($model, 'desincorporar')->widget(SwitchInput::classname(), [
                      'pluginOptions' => [
                              'onText' => 'Si',
                              'offText' => 'No',
                              'onColor' => 'success',
                              'offColor' => 'danger',
                      ]

              ]);

      ?>
    </div>


    <div class="col-sm-6">
      <?php

            echo  $form->field($model, 'etiquetar')->widget(SwitchInput::classname(), [
                      'pluginOptions' => [
                              'onText' => 'Si',
                              'offText' => 'No',
                              'onColor' => 'success',
                              'offColor' => 'danger',
                      ]

              ]);

      ?>
    </div>
  </div>




  <div class="row">
    <div class="col-sm-6">
      <?= $form->field($model, 'id_und_actual')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(common\models\UnidadesAdmin::find()->asArray()->all(), 'id', 'descripcion')
        ]); ?>
    </div>
    <div class="col-sm-6">
      <?=
        $form->field($model, 'id_resp_directo')->widget(DepDrop::classname(), [
        //'data'=> [6=>'Bank'],
        //'options' => ['placeholder' => 'Seleccione Estado'],
        'type' => DepDrop::TYPE_SELECT2,
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[

            'depends'=>[Html::getInputId($model, 'id_und_actual')],
            'url' => Url::to(['responsables']),
            'loadingText' => 'Cargando Responsables',

        ]
        ]); ?>
    </div>
  </div>






    <?= $form->field($model, 'localizacion')->textarea(['maxlength' => true]) ?>


</div>
