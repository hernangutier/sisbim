<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\web\View;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Bm3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */
$url =Url::to(['bienes-list']);
$this->title = 'Movimientos';
$this->params['breadcrumbs'][] = $this->title;
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



<div class="container">




  <h3 class="header smaller lighter red">
    <i class="ace-icon fa  	fa-comments "></i>
      Registro de Bienes en 60 Faltantes
  </h3>


  <?=



  Select2::widget([
      'name' => 'id_bien',
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
                    url : 'index.php?r=procesos%2Fbm3%2Fcreate',
                    type: 'GET',
                    data : {'id': $(this).val()},
                    DataType:'JSON',
                  })
                    .done(function(data) {

                          $.pjax.reload({container:'#grid-bm3'});
                      


                    })
                    .fail(function(data) {
                      alert( 'Ocurrio un Error...' );
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
    //'filterModel'=>$searchModel,
    'responsive'=>true,
    'hover'=>true,
    'pjax'=>true,
    'pjaxSettings'=>[
        'neverTimeout'=>true,
        'options'=>[
          'id'=>'grid-bm3',
        ],
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{admin}',
                            'buttons' => [
                              'admin' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-wrench bigger-120"></i></span> ',
                                      Url::to(['bienes/view','id'=>$model->id]), [
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'Administrar'),

                                  ]);
                              },
                      ],
              ],
              [
                              'class' => 'yii\grid\ActionColumn',
                              'template' => '{print}',
                              'buttons' => [
                                'print' => function ($url, $model, $key) {
                                    return Html::a('<span class="btn btn-xs btn-default"><i class="ace-icon fa fa-print bigger-120"></i></span> ',
                                        Url::to(['movimientos/view','id'=>$model->id]), [
                                        'id' => 'activity-index-link',
                                        'title' => Yii::t('app', 'Imprimir Comprobante'),

                                    ]);
                                },
                        ],
                ],

            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{nulls}',
                            'buttons' => [
                              'nulls' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-ban bigger-120"></i></span> ',
                                      Url::to(['bienes/update','id'=>$model->id]), [
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'Anular Transacción'),

                                  ]);
                              },
                      ],
              ],

            [
              'attribute'=>'nbien',
              'label'=>'N° de Bien',
              'value'=>function ($searchModel){
                return '<span class="badge badge-info"><b/>'. $searchModel->bien->codigo .'</span>';
              },
              'format'=>'raw',

            ],

            [
              'attribute'=>'idbien',
              'label'=>'Descripcion',
              'value'=>function ($searchModel){
                return $searchModel->bien->descripcion;
              }
            ],

              'date_in',




        ],
    ]); ?>
</div>
