<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ResponsablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Responsables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Maestro de Responsables
  </h3>






  <p>
    <div class="btn-group">
      <?= Html::a('Crear Responsable', ['create'], ['class' => 'btn btn-success']) ?>
      <?= Html::a('<i class="ace-icon fa fa-file-pdf-o bigger-125"></i>'.'Listado PDF',  Url::to('/sisbim/report/list_responsables.php') , ['class' => 'btn btn-info']) ?>
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
                          Url::to(['responsables/update','id'=>$model->id]), [
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
                                 Url::to('/sisbim/report/bienes_user.php').'?id=' . $model->id , [
                                'id' => 'activity-index-link',
                                'title' => Yii::t('app', 'Imprimir Bienes Asignados a: ' . $model->cedrif ),

                            ]);
                        },




                      ],
          ],

          [

                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{acta}',
                        'buttons' => [
                          'acta' => function ($url, $model, $key) {
                              return Html::a('<span class="btn btn-xs btn-warning"><i class="ace-icon fa fa-certificate bigger-120"></i></span> ',
                                  ($model->is_max) ? Url::to('/sisbim/report/acta_responsabilidad_max.php').'?id=' . $model->id : Url::to('/sisbim/report/acta_responsabilidad.php').'?id=' . $model->id , [
                                  'id' => 'activity-index-link',
                                  'title' => Yii::t('app', 'Imprimir Acta de Responsabilidad: ' . $model->cedrif ),

                              ]);
                          },




                        ],
            ],



            [
            'attribute'=>'cedrif',
            'label'=>'Cedula o Rif.',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->cedrif,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Responsable' ]);
            },

            'format'=>'raw'
            ],
            'NombreCompleto',

            [
                'attribute'=>'Unidad de Adscripción',
                'value'=>'codunidad0.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'id_unidad', ArrayHelper::map(common\models\UnidadesAdmin::find()->asArray()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),

            ],

            [
              'attribute'=>'activo',
              'value'=>function($searchModel){
                return $searchModel->getStatusHtml();
              },
              'format'=>'raw',

            ],
            'telefono'


            // 'email:email',
            // 'cargo',
            // 'fregistro',
            // 'personal',
            // 'alias',
            // 'codunidad',
            // 'cod',
            // 'apellidos',


        ],
    ]); ?>



  </div>
