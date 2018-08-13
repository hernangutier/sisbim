<?php

use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Archivo de Bienes Inmuebles');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
     $this->registerJs('
      $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
           window.history.pushState(null, "", window.location.href);
         };
       })

     ');
 ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-archivo',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-archive"></i> Archivo de Bienes Inmuebles</h3>',
              'type'=>'info',


              'footer'=>true,
          ],
          'toolbar' => [
        [
            'content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                'class' => 'btn btn-success',
                'title' => 'Crear Carpeta'
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
            ['class' => '\kartik\grid\SerialColumn'],



              [
                  'class' => 'yii\grid\ActionColumn',
                  'template' => '{update}',
                  'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-refresh bigger-120"></i></span> ',
                            Url::to(['archivo/update','id'=>$model->id]), [
                            'id' => 'activity-index-link',
                            'title' => Yii::t('app', 'Actualizar'),

                      ]);
                  },

                ],
                ],

                [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{delete}',
                      'buttons' => [
                        'delete' => function ($url,$model, $key) {
                              $url=Url::to(['archivo/delete','id'=>$model->id]);
                              return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar el Expediente:  ' +  '$model->nexp', function (result) {
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
            'attribute'=>'nexp',
            'label'=>'N° de Expediente',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->nexp,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Expediente' ]);
            },

            'format'=>'raw'
            ],
            'identificacion',
            'ubicacion',
            [
                'attribute'=>'Municipio',
                'value'=>function($model){
                  if (is_null($model->mun)){
                    return '';
                  }  else {
                      return $model->mun->descripcion;
                  }

                },
                'filter' => Html::activeDropDownList($searchModel,
                'id_mun', ArrayHelper::map(common\models\SdbMunicipios::find()->where(['id_est'=>'1'])->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],

            [
              'attribute'=>'ano_in',
              'value'=>function($model){
                return isset($model->ano_in) ? Html::bsLabel('<b>'. $model->ano_in . '</b>', Html::TYPE_PRIMARY) : Html::bsLabel('No Asignado', Html::TYPE_WARNING) ;
              },
              'format'=>'raw'
            ],
            [
              'attribute'=>'id_ubic',
              'label'=>'Ubicación Fisica en el Archivo',
              'value'=>function($searchModel){
                return isset($searchModel->ubic) ? Html::bsLabel('<b>'. $searchModel->ubic->referencia . '</b>', Html::TYPE_PRIMARY)  : Html::bsLabel('No Ubicado', Html::TYPE_WARNING);
              },
              'format'=>'raw',
              'filter' => Html::activeDropDownList($searchModel,
              'id_ubic', ArrayHelper::map(common\models\ArchivoUbicaciones::find()->all(),
              'id', 'referencia'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],
            [
              'attribute'=>'tipo_inmueble',
              'value'=>function ($model){
                return $model->getTipo();
              },
              'filter' => Html::activeDropDownList($searchModel,
              'tipo_inmueble', $searchModel->getListTipo() ,
              ['class'=>'form-control','prompt' => 'No Filtro']),
            ],
            [
              'attribute'=>'is_register',
              'value'=>function($model){
                return $model->getIsRegister();
              },
              'format'=>'raw',
              'filter' => Html::activeDropDownList($searchModel,
              'is_register', Enum::boolList('No', 'Si') ,
              ['class'=>'form-control','prompt' => 'No Filtro']),
            ],


        ],
    ]); ?>
