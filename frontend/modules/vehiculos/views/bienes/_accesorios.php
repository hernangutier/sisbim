<?php
use common\models\GvAccesoriosVehiculos;
use common\models\GvAccesoriosVehiculosSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Bienes */



?>


<?php
$searchModel = new GvAccesoriosVehiculosSearch();
$searchModel->id_veh=$model->id;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 ?>


 <div class="row">
   <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" style="min-height: 212.133px;">
                   <div class="widget-box widget-color-blue2">
                     <div class="widget-header">
                       <h5 class="widget-title"> <b>Accesorios en Uso</b></h5>

                       <div class="widget-toolbar">
 													<a href="#" data-action="collapse">
 														<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
 													</a>



 												</div>

                         <div class="widget-toolbar ">
                         <div class="widget-menu">
                           <?=
                           Html::button('<i class="fa fa-plus"></i>',[
                             'id' => 'activity-index-link',
                             'class' => 'btn btn-primary add',
                             'data-toggle' => 'modal',
                             'data-target' => '#modal-accesorios',
                             'data-url' => Url::to(['gv-accesorios-vehiculos/create','id_veh'=>$model->id]),
                             'data-pjax' => '0',
                           ]);
                           ?>



                         </div>
                         </div>





                     </div>

                     <div class="widget-body">
                       <div class="widget-main">

<?= GridView::widget([
  'dataProvider' => $dataProvider,
  'responsive'=>true,
  'hover'=>true,
  'pjax'=>true,
  'pjaxSettings'=>[
      'neverTimeout'=>true,
      'options'=>[
        'id'=>'grid-accesorios',
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
                                  Url::to(['gv-accesorios-vehiculos/update','id'=>$model->id]), [
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
                      $url=Url::to(['gv-accesorios-vehiculos/delete','id'=>$model->id]);
                      return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                          'title' => Yii::t('yii', 'Delete'),
                          'aria-label' => Yii::t('yii', 'Delete'),
                          'onclick' => "
                          krajeeDialog.confirm('Esta seguro de eliminar el Accesorio:  ' +  '$model->descripcion', function (result) {
                               if (result) {
                                  $.ajax({

                                  url: '$url',
                                  type: 'POST',

                                  error : function(xhr, status) {
                                    $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                  },
                                  success: function (json){
                                    $.pjax.reload({container: '#grid-accesorios'});
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


        'descripcion',
        'serial',



    ],
]); ?>



</div>
</div>
</div>
</div>
</div>
