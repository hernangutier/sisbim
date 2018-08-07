<?php
use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\MovimientosDtSearch;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MovimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-archivo',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-history "></i> Historico de Movimientos</h3>',
              'type'=>'info',


              'footer'=>false
          ],

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
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'width' => '50px',
                    'value' => function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column) {
                        return Yii::$app->controller->renderPartial('_expand_info', ['model' => $model]);
                    },
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
                    'expandOneOnly' => true,
                ],


            [
              'attribute'=>'ncontrol',
              'value'=>function ($searchModel){
                return '<span class="badge badge-info"><b/>' . str_pad($searchModel->ncontrol,10,'0',STR_PAD_LEFT) . '</span>';
              },
              'format'=>'raw',

            ],
            'fecha',
            [
              'attribute'=>'id',
              'label'=>'Descripcion',
              'value'=>function ($searchModel){
                return $searchModel->observaciones;
              }
            ],

            [
                'attribute'=>'id_und_origen',
                'value'=>function ($searchModel){
                  return '<span class="badge badge-danger"><b>' . $searchModel->idUndOrigen->descripcion . '</b></span>';
                },
                'format'=>'raw',
                'filter' => Html::activeDropDownList($searchModel,
                'id_und_origen', ArrayHelper::map(common\models\UnidadesAdmin::find()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],




            [
              'attribute'=>'status',
              'value'=>function ($searchModel){
                return $searchModel->getStatusHtml();
              },
              'format'=>'raw',
              'filter' => Html::activeDropDownList($searchModel,
              'status', ['0'=>'Pendiente','1'=>'Procesado','2'=>'Anulado'],['class'=>'form-control','prompt' => 'No Filtro']),

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
