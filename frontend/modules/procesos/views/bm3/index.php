<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Bm3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Historico Desincorporaciones por Concepto 60 Faltantes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

  <h3 class="header smaller lighter red2">
    <i class="ace-icon fa fa-hand-o-left "></i>
      Historico Desincorporaciones por Concepto 60 Faltantes
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
                                      Url::to(['bm3/view','id'=>$model->id]), [
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
                                        'title' => Yii::t('app', 'Imprimir BM3'),

                                    ]);
                                },
                        ],
                ],


                [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{anular}',
                      'buttons' => [
                        'anular' => function ($url,$model, $key) {
                              $url=Url::to(['bm3/delete','id'=>$model->id]);

                              return ($model->status==0 ? Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-times bigger-120"></i></span> ', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de anular la desincorporacion del periodo:  ', function (result) {
                                       if (result) {
                                          $.ajax({

                                          url: '$url',
                                          type: 'POST',

                                          error : function(xhr, status) {
                                            $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                          },
                                          success: function (json){
                                            $.pjax.reload({container: '#grid-clientes'});
                                            $('.alert-s-ant').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
                                          },

                                      }) :
                                    }
                                  });
                                      return false;
                                  ",
                              ]) : '');
                          },

                          ],
                  ],



            [
            'attribute'=>'id',
            'label'=>'Periodo',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->periodo->descripcion,
                    ['view','id'=>$searchModel->periodo->descripcion],
                    ['title'=>'Ver Datos de la Transacción' ]);
            },

            'format'=>'raw'
            ],
            'observaciones',
            [
              'attribute'=>'status',
              'label'=>'Estado',
              'value'=>function($searchModel){
                return $searchModel->getStatusHtml();
              },
              'format'=>'raw',
            ]

            // 'email:email',
            // 'responsable',
            // 'tlfcontact',
            // 'observacion',
            // 'fechacreacion',
            // 'activo',
            // 'tipo',
            // 'cod',
            // 'tipo_de_proveedor',
            // 'codigo',
            // 'otra_descripcion',
            // 'telefono2',


        ],
    ]); ?>


    </div>
