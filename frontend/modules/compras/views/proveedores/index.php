<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProveedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proveedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<?php echo Dialog::widget(); ?>
  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Maestro de Proveedores
  </h3>
  <p>
      <?= Html::a('Registrar Proveedor', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
  <div class="alert alert-success alert-s-ant" hidden="false" role="alert"> </div>
  <div class="alert alert-danger alert-d-ant" hidden="false" role="alert"> </div>


      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'hover'=>true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-proveedores',
            ],
        ],
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
                    'template' => '{cargar}',
                    'buttons' => [
                        'cargar' => function ($url, $model, $key) {
                          return  Html::a('<span class="btn btn-xs btn-info"><i class="ace-icon fa fa-desktop bigger-120"></i></span> ', '#', [
                                'id' => 'activity-index-link',
                                'title' => Yii::t('app', 'Registrar Compra al Proveedor: ' . $model->razon),
                                'onclick' => "
                                krajeeDialog.confirm('Esta seguro cargar Factura al Proveedor:  ' +  '$model->razon', function (result) {
                                })",

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
                      'attribute'=>'rif',
                      'label'=>'Rif','value'=>function ($searchModel, $key, $index, $widget) {
                          return Html::a($searchModel->rif,
                              ['view','id'=>$searchModel->id],
                              ['title'=>'Ver Datos del Proveedor' ]);
                      },
                        'format'=>'raw'
                  ],
            'razon',
            'direccion',
            'telefono',
            // 'fax',
            // 'email:email',
            // 'web',
            // 'contacto',
            // 'tel_contacto',


        ],
    ]); ?>
</div>
