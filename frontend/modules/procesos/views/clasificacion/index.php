<?php

use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ClasificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clasificaciones (Pub. 21)');
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
              'id'=>'grid-clas',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-tags "></i> Clasificaciones Pub. 21</h3>',
              'type'=>'info',


              'footer'=>true,
          ],
          'toolbar' => [
        [
            'content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                'class' => 'btn btn-success',
                'title' => 'Crear Clasificacion'
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
                            Url::to(['clasificacion/update','id'=>$model->id]), [
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
                              $url=Url::to(['clasificacion/delete','id'=>$model->id]);
                              return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                                  'title' => 'Eliminar Linea:  ' .  $model->descripcion,
                                  'aria-label' => Yii::t('yii', 'Eliminar Clasificacion'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar la Clasificacion:  ' +  '$model->descripcion', function (result) {
                                       if (result) {
                                          $.ajax({

                                          url: '$url',
                                          type: 'POST',

                                          error : function(xhr, status) {
                                            krajeeDialog.alert('Este Registro no se puede eliminar porque tiene información asociada');
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



            'grupo',
            'subgrupo',
            'seccion',
            'descripcion',

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
