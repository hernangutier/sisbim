<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EntesExternosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Entes Externos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



  <div class="container">


    <h3 class="header smaller lighter blue">
      <i class="ace-icon fa  	fa-comments "></i>
        Maestro de Entes Externos
    </h3>
  <p>
    <div class="btn-group">
      <?= Html::a('Registrar Ente Externo', ['create'], ['class' => 'btn btn-success']) ?>
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
                            Url::to(['entes-externos/update','id'=>$model->id]), [
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
            'attribute'=>'rif',
            'label'=>'Rif',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->rif,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Ente Externo' ]);
            },

            'format'=>'raw'
            ],

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
