<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MovimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter red">
    <i class="ace-icon fa  	fa-comments "></i>
      Registro de Bienes en 60 Faltantes
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
