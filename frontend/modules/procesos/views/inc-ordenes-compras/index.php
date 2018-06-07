<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\dialog\Dialog;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IncOrdenesComprasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordenes de Compra';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->registerJs("
$(document).on('click','.add',function (){

  $('.tl').text('Anular Orden de Compra');
  $.get(

      $(this).data('url'),
      function (data) {
          $('.modal-body').html(data);
          $('#modal-orden-anular').modal();
      }
  );


  });

  $(document).on('click','.add-poliza',function (){

    $('.tl').text('Registrar Poliza');
    $.get(

        $(this).data('url'),
        function (data) {
            $('.modal-body').html(data);
            $('#modal-accesorios').modal();
        }
    );


    });





");
?>

<?php
Modal::begin([
    'id' => 'modal-orden-anular',
    'header' => '<h4 class="blue bigger tl">Nuevo Articulo</h4>',

]);

echo "<div class='well'></div>";

Modal::end();
?>

<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Historico de Ordenes de Compra
  </h3>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{admin}',
                            'buttons' => [
                              'admin' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-wrench bigger-120"></i></span> ',
                                      Url::to(['inc-ordenes-compras/view','id'=>$model->id]), [
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
                                    return Html::a('<span class="btn btn-xs btn-default  "><i class="ace-icon fa fa-print bigger-120"></i></span> ',
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
                                  return Html::a('<span class="btn btn-xs btn-danger add"><i class="ace-icon fa fa-ban bigger-120"></i></span> ',
                                      '#', [
                                      'title' => Yii::t('app', 'Anular Transacción'),
                                      'data-toggle' => 'modal',
                                      'data-target' => '#modal-orden-anular',
                                      'data-url' =>  Url::to(['inc-ordenes-compras/nulls','id'=>$model->id]),
                                      'data-pjax' => '0',

                                  ]);
                              },
                      ],
              ],

            [
              'attribute'=>'num',
              'value'=>function ($searchModel){
                return '<span class="badge badge-info"><b/>' . $searchModel->num . '</span>';
              },
              'format'=>'raw',

            ],
            'fecha',
            [
              'attribute'=>'id',
              'label'=>'Descripcion',
              'value'=>function ($searchModel){
                return $searchModel->descripcion;
              }
            ],

            [
                'attribute'=>'id_prov',
                'value'=>function ($searchModel){
                  return '<span class="badge badge-info"><b>' . $searchModel->prov->razon . '</b></span>';
                },
                'format'=>'raw',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'id_prov',
                    'data' => ArrayHelper::map(common\models\Proveedores::find()->all(),'id','razon'),
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'options' => [

                      'placeholder' => 'Filtrar por Proveedor...',
                    ]
                ]),


            ],




            [
              'attribute'=>'status',
              'value'=>function ($searchModel){
                return $searchModel->getStatusHtml();
              },
              'format'=>'raw',

            ],
            // 'id_user',
            // 'ncontrol',
            // 'tipo',
            // 'status',
            // 'periodo',
            // 'ano',
            // 'fecha_process',
            // 'fecha_creation',


        ],
    ]); ?>
</div>
