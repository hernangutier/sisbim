<?php
use common\models\ArchivoDocumentos;
use common\models\ArchivoDocumentosSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArchivoDocumentos */



?>


<?php
$searchModel = new ArchivoDocumentosSearch();
$searchModel->id_archivo=$model->id;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 ?>



<?= GridView::widget([
  'dataProvider' => $dataProvider,
  'responsive'=>true,
  'hover'=>true,
  'pjax'=>true,
  'pjaxSettings'=>[
      'neverTimeout'=>true,
      'options'=>[
        'id'=>'grid-documentos',
      ],
  ],
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="fa fa-folder-open"></i> Documentos del Expediente</h3>',
        'type'=>'info',


        'footer'=>false
    ],
  'toolbar' => [
 [
    'content'=>
    Html::a('<i class="glyphicon glyphicon-plus"></i>', '#', [

        'title' => 'Crear Expediente',
        'class' => 'btn btn-success add',
        'data-toggle' => 'modal',
        'data-target' => '#modal-documentos',
        'data-url' => Url::to(['archivo-documentos/create-modal','id_archivo'=>$model->id]),
        'data-pjax' => '0',
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
                              return Html::a('<span class="btn btn-xs btn-primary update"><i class="ace-icon fa fa-refresh bigger-120"></i></span> ',
                                  '#', [
                                  'title' => Yii::t('app', 'Actualizar'),
                                  'data-toggle' => 'modal',
                                  'data-target' => '#modal-documentos',
                                  'data-url' => Url::to(['archivo-documentos/update', 'id' => $model->id]),
                                  'data-pjax' => '0',

                              ]);
                          },




                        ],
          ],

        [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{delete}',
              'buttons' => [
                'delete' => function ($url,$model, $key) {
                      $url=Url::to(['archivo-documentos/delete','id'=>$model->id]);
                      return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                          'title' => Yii::t('yii', 'Delete'),
                          'aria-label' => Yii::t('yii', 'Delete'),
                          'onclick' => "
                          krajeeDialog.confirm('Esta seguro de eliminar el Documento:  ' +  '$model->id', function (result) {
                               if (result) {
                                  $.ajax({

                                  url: '$url',
                                  type: 'POST',

                                  error : function(xhr, status) {
                                    $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                  },
                                  success: function (json){
                                    $.pjax.reload({container: '#grid-documentos'});
                                    //$('.alert-s-ant').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
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
            'attribute'=>'tipo',
            'value'=>function($model){
              return $model->tipo0->descripcion;
            }
          ],
          'ano_ejecucion',
          'datos_registro',
          [
            'attribute'=>'monto',
            'value'=>function ($model)
            {
              return number_format($model->monto,2);
            }
          ]

        ],



]); ?>
