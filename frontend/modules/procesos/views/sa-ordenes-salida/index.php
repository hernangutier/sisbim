<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SaOrdenesSalidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orenes de Salida';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Historico de Ordenes de Salida
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
                                      Url::to(['movimientos/view','id'=>$model->id]), [
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
                                        'title' => Yii::t('app', 'Imprimir Orden'),

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
              'attribute'=>'ncontrol',
              'value'=>function ($searchModel){
                return '<span class="badge badge-info"><b/>' . str_pad($searchModel->ncontrol,10,'0',STR_PAD_LEFT) . '</span>';
              },
              'format'=>'raw',

            ],
            'date_creation',
            [
                'attribute'=>'motivo',
                'value'=>function ($searchModel){
                  return '<span class="badge badge-danger"><b>' . $searchModel->getItemsMotivo . '</b></span>';
                },
                'format'=>'raw',
                'filter' => Html::activeDropDownList($searchModel,
                'motivo', ArrayHelper::map(common\models\SaOrdenesSalida::getListMotivos(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
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
