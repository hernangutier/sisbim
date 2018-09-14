<?php

use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\dialog\Dialog;
use yii\bootstrap\Modal;
//use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IncOrdenesComprasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro de Inspecciones';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
Modal::begin([
    'id' => 'modal-ordenes-null',
    'header' => '<h4 class="blue bigger tl">Anular Orden de Compra</h4>',

]);

echo "<div class='well'></div>";

Modal::end();
?>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-inspecciones',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-user-secret"></i> Registro de Inspecciones</h3>',
              'type'=>'info',


              'footer'=>true,
          ],
          'toolbar' => [
        [
            'content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                'class' => 'btn btn-success',
                'title' => 'Registrar Inspección'
            ]) . ' '.
                Html::a('<i class="ace-icon fa fa-file-pdf-o bigger-125"></i>', ['grid-demo'], [
                    'class' => 'btn btn-info',
                    'title' => 'Listado'
                ]),

        ],
        '{export}',
        '{toggleData}'
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{admin}',
                            'buttons' => [
                              'admin' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-wrench bigger-120"></i></span> ',
                                      Url::to(['div-inspecciones/view','id'=>$model->id]), [
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

                                },
                        ],
                ],
                [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{nulls}',
                                'buttons' => [

                                  'nulls' => function ($url, $model, $key) {
                                    $url=Url::to(['inc-ordenes-compras/nulls','id'=>$model->id]);
                                    return

                                    ($model->status==0) ?
                                    Html::a('<span class="btn btn-xs btn-danger open"><i class="ace-icon fa fa-ban bigger-120"></i></span>', '#', [
                                        'title' => Yii::t('yii', 'Anular Orden de Compra'),

                                        'onclick' => "

                                        $('#modal-ordenes-null').modal('show')

                                        .find('.modal-body')
                                        .load('$url');

                                        ",

                                    ]) : '';



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
                return '<span class="badge badge-info"><b/>' . $searchModel->ncontrol . '</span>';
              },
              'format'=>'raw',

            ],
            'f_ini',
            [
              'attribute'=>'id',
              'label'=>'Descripcion',
              'value'=>function ($searchModel){
                return $searchModel->descripcion;
              }
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
