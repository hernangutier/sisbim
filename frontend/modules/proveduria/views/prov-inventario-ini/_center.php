<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\dialog\Dialog;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\bootstrap\Modal;
use yii\web\Response;
use yii\web\View;
use yii\web\JsExpression;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
$url =Url::to(['articulos-list']);

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProvInventarioIniDtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


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
    '<h4><b/>' + city.ref + '</h4>' +
  '</div>' +
  '<div class="col-sm-6">' +

      '<h4><b style="margin-left:5px">' + city.descripcion + '</b></h4>' +
  '</div>' +

  '<div class="col-sm-3">' +

      '<h4><b style="margin-left:5px">' + city.existencias + '</b></h4>' +
  '</div>' +

'</div>';

  return '<div style="overflow:hidden;">' + markup + '</div>';
};
JS;

$this->registerJs($formatJs, View::POS_HEAD);

 ?>



 <?php
 Modal::begin([
     'id' => 'modal-inventario-init',
     'header' => '<h4 class="blue bigger tl">Nuevo Articulo</h4>',

 ]);

 echo "<div class='well'></div>";

 Modal::end();
 ?>



<?php echo Dialog::widget(); ?>


<?=


Select2::widget([
    'name' => 'id_art',
    'value' => '1',
    'size' => Select2::LARGE,
    'initValueText' => 'Consultar Articulos...',
    'options' => ['placeholder' => 'Buscar Articulos'],

    'addon' => [
      'append' => [
          'content' => Html::button('<i class="fa fa-plus"></i>',[
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['prov-articulos/modal']),
            'data-pjax' => '0',
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
       'templateSelection' => new JsExpression('function (city) { return city.ref + " " + city.descripcion; }'),
    ],

    'pluginEvents' => [

        "select2:select" => "function() {

          // creamos peticion ajax ----
          $.ajax(
                {
                  url : 'index.php?r=proveduria%2Fprov-inventario-ini-dt%2Fadd-data',
                  type: 'GET',
                  data : {'id':$(this).val()},
                  DataType:'JSON',
                })
                  .done(function(data) {
                    if (data.result==null){
                        $.pjax.reload({container:'#grid-inv-init-dt'});
                    }  else {
                      krajeeDialog.alert(data.result);
                    }


                  })
                  .fail(function(data) {
                    alert( data );
                  })
                  .always(function(data) {
                    //alert( 'complete' );
            });

        }",

        "select2:unselect" => "function() {itemSelected=null;
          $('.detalle').hide();
        }"
    ],


]);




?>


<?= GridView::widget([
  'dataProvider' => $dataProvider,

  'responsive'=>true,
  'hover'=>true,
  'pjax'=>true,
  'pjaxSettings'=>[
      'neverTimeout'=>true,
      'options'=>[
        'id'=>'grid-inv-init-dt',
      ],
  ],
  'columns' => [
      ['class' => 'yii\grid\SerialColumn'],







          [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                  'delete' => function ($url,$model, $key) {
                        $url=Url::to(['prov-inventario-ini-dt/delete','id'=>$model->id]);
                        return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'onclick' => "
                            krajeeDialog.confirm('Esta seguro de eliminar el Items:  ', function (result) {
                                 if (result) {
                                    $.ajax({

                                    url: '$url',
                                    type: 'POST',

                                    error : function(xhr, status) {
                                      //$('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                    },
                                    success: function (json){
                                      $.pjax.reload({container: '#grid-inv-init-dt'});
                                      //$('.alert-s-ant').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
                                    },

                                });
                              }
                            });
                                return false;
                            ",
                        ]);
                    },

                    ],
            ],


            [
                'attribute'=>'id_art',
                'label'=>'Referencia','value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->art->ref,
                        ['view','id'=>$searchModel->id],
                        ['title'=>'Ver Datos del Articulo' ]);
                },
                  'format'=>'raw'
            ],

            [
                'attribute'=>'id_art',
                'label'=>'Descripcion','value'=>function ($searchModel, $key, $index, $widget) {
                    return $searchModel->art->descripcion;

                },

            ],
            [
              'class'=>'kartik\grid\EditableColumn',
              'attribute'=>'cnt',
              'editableOptions'=>[
                  'header'=>'Existencia',
                  //'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
                  //'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]],
                  'asPopover' => false,
              ],
              'hAlign'=>'right',
              'vAlign'=>'middle',
              'width'=>'100px',
              'format'=>['decimal', 2],

          ],
      // 'fax',
      // 'email:email',
      // 'web',
      // 'contacto',
      // 'tel_contacto',


  ],
]); ?>
