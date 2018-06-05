<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\SbdCategoriasEsp;
use  yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\ProvArticulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Insumos y Suministros');
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container">



<div class="row">
  <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" style="min-height: 212.133px;">
                  <div class="widget-box widget-color-blue2">
                    <div class="widget-header">
                      <h5 class="widget-title"> <b>Insumos y Suministros</b></h5>

                      <div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
													</a>



												</div>

                        <div class="widget-toolbar ">
                        <div class="widget-menu">
                          <?= Html::a(Yii::t('app', '<i class="ace-icon fa fa-plus "></i> Nuevo'), ['create'], ['class' => 'btn  btn-primary btn-bold pull-right']) ?>



                        </div>
                        </div>





                    </div>

                    <div class="widget-body">
                      <div class="widget-main">
                        <?php Pjax::begin(); ?>
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
                                                          Url::to(['prov-articulos/update','id'=>$model->id]), [
                                                          'id' => 'activity-index-link',
                                                          'title' => Yii::t('app', 'Actualizar'),

                                                      ]);
                                                  },




                                                ],
                                  ],

                                [
                                'attribute'=>'ref',
                                'label'=>'Referencia',

                                'value'=>function ($searchModel, $key, $index, $widget) {
                                    return Html::a($searchModel->ref,
                                        ['view-resumen','id'=>$searchModel->id],
                                        ['title'=>'Ver Datos del Articulo' ]);
                                },

                                'format'=>'raw'
                                ],


                                'descripcion',

                                [
                                    'attribute'=>'id_lin',
                                    'label'=>'Linea',
                                    'value'=>function($model){
                                      return $model->idLin->descripcion;
                                    },
                                    'filter' => Html::activeDropDownList($searchModel,
                                    'id_lin', ArrayHelper::map(common\models\ProvArtLineas::find()->all(),
                                    'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                                ],

                                [
                                  'attribute'=>'existencia',
                                  'label'=>'Existencia Actual',
                                  'value'=>function($searchModel){
                                    return $searchModel->existencias;

                                  }
                                ],



                                /*
                                [
                                    'attribute'=>'Responsable',
                                    'value'=>function($model){
                                      return (is_null($model->idresp) ?  ($model->is_colectivo) ? ' Uso Colectivo ' :   'No asignado' : $model->idresp->nombres . ' ' . $model->idresp->apellidos);
                                    },
                                    'filter' => Html::activeDropDownList($searchModel,
                                    'id_resp_directo', ArrayHelper::map(common\models\Responsables::find()->all(),
                                    'id', 'nombres'),['class'=>'form-control','prompt' => 'No Filtro']),
                                ],

                                [
                                    'attribute'=>'Linea',
                                    'value'=>function($model){
                                      return $model->idlin0->descripcion;
                                    },
                                    'filter' => Html::activeDropDownList($searchModel,
                                    'id_lin', ArrayHelper::map(common\models\Lineas::find()->all(),
                                    'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                                ],
                                [
                                    'attribute'=>'Categoria (SUDEBIP)',
                                    'value'=>function($model){
                                      if (is_null($model->idcat0)){
                                        return '';
                                      }  else {
                                          return $model->idcat0->descripcion;
                                      }

                                    },
                                    'filter' => Html::activeDropDownList($searchModel,
                                    'id_cat', ArrayHelper::map(common\models\SdbCategoriasEsp::find()->all(),
                                    'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                                ],

                                [
                                    'attribute'=>'Estado Uso (SUDEBIP)',
                                    'value'=>function($model){
                                      if (is_null($model->estado_uso)){
                                        return '';
                                      }  else {
                                          return $model->getEstadoUso();
                                      }

                                    },
                                    'filter' => Html::activeDropDownList($searchModel,
                                    'estado_uso', ArrayHelper::map(common\models\Bienes::getListEstadosUso(),
                                    'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                                ],

                                */





                                // 'codresp_directo',
                                // 'status',
                                // 'costo',
                                // 'notasigned',
                                // 'observacion',
                                // 'isvehicle',
                                // 'codvehicle',
                                // 'foto:ntext',
                                // 'cod_und_actual',
                                // 'isasigned',
                                // 'descripcion:ntext',
                                // 'marca',
                                // 'codclas',
                                // 'fcreacion',
                                // 'coduser',
                                // 'operativo',
                                // 'tipobien',
                                // 'codlin',
                                // 'localizacion',
                                // 'fdesinc',
                                // 'pendientedesinc',
                                // 'undmedida',
                                // 'aplicaiva',
                                // 'existe',
                                // 'codcat',
                                // 'statusfisical',
                                // 'disponibilidad',
                                // 'foto1',
                                // 'mantenimiento',
                                // 'estado_uso',
                                // 'estado_fisico',
                                // 'old_cod',
                                // 'activo',
                                // 'is_colectivo:boolean',

                            ],
                        ]); ?>
                        <?php Pjax::end(); ?>

                      </div>
                    </div>
                  </div>
                </div>
</div>



</div>
