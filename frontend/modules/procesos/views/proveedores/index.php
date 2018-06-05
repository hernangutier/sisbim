<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProveedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proveedores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



<div class="row">
  <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" style="min-height: 212.133px;">
                  <div class="widget-box widget-color-blue2">
                    <div class="widget-header">
                      <h5 class="widget-title"> <b>Maestro de Proveedores</b></h5>

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
                            Url::to(['proveedores/update','id'=>$model->id]), [
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
                              $url=Url::to(['proveedores/delete','id'=>$model->id]);
                              return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar el Proveedor:  ' +  '$model->razon', function (result) {
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
            'attribute'=>'codigo',
            'label'=>'Código',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codigo,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Proveedor' ]);
            },

            'format'=>'raw'
            ],
            'cedrif',
            'razon',
            'direccion',
            'telefono',
            'fax',
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
    </div>
    </div>
    </div>
    </div>
    </div>
