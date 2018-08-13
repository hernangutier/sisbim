<?php

use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UnidadesAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidades Funcionales';
$this->params['breadcrumbs'][] = $this->title;
?>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-unidad',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-sitemap bigger-160"></i> Unidades Funcionales</h3>',
              'type'=>'info',


              'footer'=>true,
          ],
          'toolbar' => [
        [
            'content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                'class' => 'btn btn-success',
                'title' => 'Crear Unidad Funcional'
            ]) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                'class' => 'btn btn-primary',
                'title' => 'Limpiar Filtros'
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
                'template' => '{update}',
                'buttons' => [
                  'update' => function ($url, $model, $key) {
                      return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-refresh bigger-120"></i></span> ',
                          Url::to(['unidades-admin/update','id'=>$model->id]), [
                          'id' => 'activity-index-link',
                          'title' => Yii::t('app', 'Actualizar'),

                    ]);
                },

              ],
          ],


          [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{print}',
                        'buttons' => [
                          'print' => function ($url, $model, $key) {
                              return Html::a('<span class="btn btn-xs btn-success"><i class="ace-icon fa fa-print bigger-120"></i></span> ',
                                   Url::to('/sisbim/report/bienes_unidades.php').'?id=' . $model->id , [
                                  'id' => 'activity-index-link',
                                  'title' => Yii::t('app', 'Imprimir Bienes Asignados a: ' . $model->descripcion ),

                              ]);
                          },




                        ],
            ],








            [
            'attribute'=>'codigo',
            'label'=>'Código',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codigo,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos de la Unidada Adminstrativa' ]);
            },

            'format'=>'raw'
            ],

            'descripcion',

            [
                'attribute'=>'Categoria',
                'value'=>'categoria0.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'categoria', ArrayHelper::map(common\models\SdbCatUnidadesAdmin::find()->asArray()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],

            [
                'attribute'=>'Sede de Adscripción',
                'value'=>'idsede.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'id_sede', ArrayHelper::map(common\models\SdbSedes::find()->asArray()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],




        ],
    ]); ?>
