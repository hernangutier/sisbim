<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UnidadesAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidades Funcionales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Maestro de Unidades Funcionales
  </h3>
<p>
  <div class="btn-group">
    <?= Html::a('Crear Unidad Administrativa', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('<i class="ace-icon fa fa-file-pdf-o bigger-125"></i>'.'Listado PDF',  Url::to('/sisbim/report/unidades_funcionales.php') , ['class' => 'btn btn-info']) ?>
  </div>

</p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Categoria']),
            ],

            [
                'attribute'=>'Sede de Adscripción',
                'value'=>'idsede.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'id_sede', ArrayHelper::map(common\models\SdbSedes::find()->asArray()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Sede']),
            ],



            ['class' => 'yii\grid\ActionColumn',
                'template' => '{asignar}',

                 //--------- Actualizar ---
             'buttons' => [
               'delete' => function ($url, $searchModel) {
                 return Html::a(Yii::t('app',''), ['unidades-admin/delete', 'id' => $searchModel->id], [
                     'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                     'data' => [
                         'confirm' => Yii::t('app', 'Estas Seguro de Eliminar la Unidad Administrativa: '.$searchModel->codigo ),
                         'method' => 'post',
                     ],
                 ]);


               },



               'update' => function ($url,$searchModel) {
                 return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                            ['unidades-admin/update','id'=>$searchModel->id],

                            ['title'=>'Actualizar',
                            'class'=>'blue',
                           ]);
               },


                 'asignar' => function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-equalizer"></span>',['asignarpadre','id'=>$model->id]);

                    },
             ],
            ],
        ],
    ]); ?>
    </div>
