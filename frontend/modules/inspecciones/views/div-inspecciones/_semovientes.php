<?php
use common\models\DivSemovientes;
use common\models\DivSemovientesSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\DivSemovientes */



?>


<?php
$searchModel = new DivSemovientesSearch();
$searchModel->id_insp=$model->id;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 ?>


 <div class="row">
   <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" style="min-height: 212.133px;">
                   <div class="widget-box widget-color-blue2">
                     <div class="widget-header">
                       <h5 class="widget-title"> <b>Bovinos Registrados</b></h5>

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
                             'data-target' => '#modal-semovientes',
                             'data-url' => Url::to(['div-semovientes/create','id_insp'=>$model->id]),
                             'data-pjax' => '0',
                           ]);
                           ?>

                           <?=
                           Html::button('<i class="fa fa-print"></i>',[
                             'id' => 'reporte',
                             'class' => 'btn btn-primary',
                             'data-url' => Url::to('/sisbim/report/bienes_no_ubicados.php'),
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
  'filterModel' => $searchModel,
  'pjaxSettings'=>[
      'neverTimeout'=>true,
      'options'=>[
        'id'=>'grid-semovientes',
      ],
  ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],


        [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{delete}',
              'buttons' => [
                'delete' => function ($url,$model, $key) {
                      $url=Url::to(['div-semovientes/delete','id'=>$model->id]);
                      return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                          'title' => Yii::t('yii', 'Delete'),
                          'aria-label' => Yii::t('yii', 'Delete'),
                          'onclick' => "
                          krajeeDialog.confirm('Esta seguro de eliminar el Bovino:  ' +  '$model->nbov', function (result) {
                               if (result) {
                                  $.ajax({

                                  url: '$url',
                                  type: 'POST',

                                  error : function(xhr, status) {
                                    $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                  },
                                  success: function (json){
                                    $.pjax.reload({container: '#grid-semovientes'});

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


        'nbov',
        [
          'attribute'=>'sexo',
          'value'=>function($model){
            return $model->getSexoHtml();
          },
          'format'=>'raw',
        ],
        [
          'attribute'=>'categoria',
          'value'=>function($model){
            return $model->getCategoria();
          }
        ]



    ],
]); ?>



</div>
</div>
</div>
</div>
</div>