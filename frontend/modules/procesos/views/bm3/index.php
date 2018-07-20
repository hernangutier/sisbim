<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\web\View;
use yii\web\JsExpression;
//use kartik\dialog\Dialog;
use kartik\editable\Editable;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Bm3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */
$url =Url::to(['bienes-list']);
$this->title = 'Registro de Bienes en 60 Faltantes';
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

      '<h4><b style="margin-left:5px">' + city.ubicacion + '</b></h4>' +
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
                            'template' => '{nulls}',
                            'buttons' => [
                              'nulls' => function ($url, $model, $key) {
                                  $url1=Url::to(['bm3/delete','id'=>$model->id]);
                                  return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                                      'title' => Yii::t('yii', 'Eliminar el Items'),
                                      'aria-label' => Yii::t('yii', 'Delete'),
                                      'onclick' => "
                                      krajeeDialog.confirm('Esta seguro de eliminar el Items:  ', function (result) {
                                           if (result) {
                                              $.ajax({

                                              url: '$url1',
                                              type: 'POST',

                                              error : function(xhr, status) {
                                                $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                              },
                                              success: function (json){
                                                $.pjax.reload({container: '#grid-bm3'});
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

            [
              'class'=>'kartik\grid\EditableColumn',
              'attribute'=>'observaciones',

              'editableOptions'=>[
                  'header'=>'Existencia',
                  'asPopover' => false,
                  'inputType'=>Editable::INPUT_TEXTAREA,

              ],


          ],
              'date_in',





        ],
    ]); ?>
</div>
