<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\bootstrap\Modal;
use yii\web\Response;
use yii\web\View;
use yii\web\JsExpression;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
$url =Url::to(['bienes-list']);

/* @var $this yii\web\View */
/* @var $searchModel common\models\Bm3DtSearch */
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
    '<h4><b/>' + city.codigo + '</h4>' +
  '</div>' +
  '<div class="col-sm-6">' +

      '<h4><b style="margin-left:5px">' + city.descripcion + '</b></h4>' +
  '</div>' +

  '<div class="col-sm-3">' +

      '<h4><b style="margin-left:5px">' + city.asignacion + '</b></h4>' +
  '</div>' +

'</div>';

  return '<div style="overflow:hidden;">' + markup + '</div>';
};
JS;

$this->registerJs($formatJs, View::POS_HEAD);

 ?>










<?=


($searchModel->bm3->status==0 ?
Select2::widget([
    'name' => 'id_art',
    'value' => '1',
    'size' => Select2::LARGE,
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
       'templateSelection' => new JsExpression('function (city) { return city.codigo + " " + city.descripcion; }'),
    ],

    'pluginEvents' => [

        "select2:select" => "function() {

          // creamos peticion ajax ----
          $.ajax(
                {
                  url : 'index.php?r=procesos%2Fbm3%2Fadd-items',
                  type: 'GET',
                  data : {'id_bm3': '$searchModel->id_bm3', 'id_bien':$(this).val()},
                  DataType:'JSON',
                })
                  .done(function(data) {
                    if (data.result==null){
                        $.pjax.reload({container:'#grid-bm3-dt'});
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


]) : '');




?>


<?= GridView::widget([
  'dataProvider' => $dataProvider,

  'responsive'=>true,
  'hover'=>true,
  'pjax'=>true,
  'pjaxSettings'=>[
      'neverTimeout'=>true,
      'options'=>[
        'id'=>'grid-bm3-dt',
      ],
  ],
  'columns' => [
      ['class' => 'yii\grid\SerialColumn'],







          [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                  'delete' => function ($url,$model, $key) {
                        $url=Url::to(['bm3-dt/delete','id'=>$model->id]);
                        return ($model->bm3->status==0 ? Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
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
                                      $.pjax.reload({container: '#grid-bm3-dt'});
                                      //$('.alert-s-ant').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
                                    },

                                });
                              }
                            });
                                return false;
                            ",
                        ]) : '');
                    },

                    ],
            ],


            [
                'attribute'=>'id_art',
                'label'=>'Referencia','value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->bien->codigo,
                        ['view','id'=>$searchModel->id],
                        ['title'=>'Ver Datos del Articulo' ]);
                },
                  'format'=>'raw'
            ],

            [
                'attribute'=>'id_art',
                'label'=>'Descripcion','value'=>function ($searchModel, $key, $index, $widget) {
                    return $searchModel->bien->descripcion;

                },

            ],

            [
              'attribute'=>'id_art',
              'label'=>'Ubicación',
              'value'=>function($searchModel){
                return $searchModel->bien->idUndActual->descripcion;
              }

            ],
            [
              'attribute'=>'id_art',
              'label'=>'Condición Fisica',
              'value'=>function($searchModel){
                return $searchModel->bien->getEstadoFisicoHtml();
              },
              'format'=>'raw',
            ],
      // 'fax',
      // 'email:email',
      // 'web',
      // 'contacto',
      // 'tel_contacto',


  ],
]); ?>
