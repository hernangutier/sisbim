<?php
use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\Bm3MasterSearch;
use kartik\dialog\Dialog;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Bm3MasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comprobantes Bm3';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo Dialog::widget(); ?>

<?php
Modal::begin([
    'id' => 'modal-close',
    'header' => '<h4 class="blue bigger tl">Cerrar Inventario</h4>',

]);

echo "<div class='well'></div>";

Modal::end();
?>


<?php
$this->registerJs("
  $(document).on('click', '#activity-close-link', (function() {
      $('.tl').text('Cerrar Inventario');
      $.get(

          $(this).data('url'),
          function (data) {
              $('.modal-body').html(data);
              $('#modal-close').modal();
          }
      );
  }));

  $(document).on('click', '#activity-bien', (function() {
      $('.tl').text('Nuevo Bien');
      $.get(

          $(this).data('url'),
          function (data) {
              $('.modal-body').html(data);
              $('#modal-semovientes').modal();
          }
      );
  }));

  ");
 ?>


<?php
     $this->registerJs("
      $(document).ready(function() {
        window.history.pushState(null, '', window.location.href);
        window.onpopstate = function() {
           window.history.pushState(null, '', window.location.href);
         };
       })
        ");
 ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,
        'pjax'=>true,
        'responsive'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-periodos',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-history "></i> Comprobantes Bm3</h3>',
              'type'=>'info',


              'footer'=>true,
          ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

              [
                              'class' => 'yii\grid\ActionColumn',
                              'template' => '{print}',
                              'buttons' => [
                                'print' => function ($url, $model, $key) {
                                    return Html::a('<span class="btn btn-xs btn-default"><i class="ace-icon fa fa-print bigger-120"></i></span> ',
                                        '#', [
                                        'id' => 'activity-index-link',
                                        'title' => Yii::t('app', 'Imprimir Comprobante'),

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
              'attribute'=>'id',
              'label'=>'N° de Control',
              'value'=>function ($searchModel){
                return $searchModel->getNControlFormat();
              }
            ],

            'date_ini',
            'date_close',
            [
              'attribute'=>'id_periodo',
              'value'=>function($model){
                return $model->periodo->descripcion;
              }
            ],
            [
              'attribute'=>'status',
              'value'=>function ($searchModel){
                return $searchModel->getStatusHtml();
              },
              'format'=>'raw',
              'filter' => Html::activeDropDownList($searchModel,
              'status', ['0'=>'Pendiente','1'=>'Procesado','2'=>'Anulado'],['class'=>'form-control','prompt' => 'No Filtro']),

            ],

            // 'id_user',
            // 'ncontrol',
            // 'tipo',
            // 'status',
            // 'periodo',
            // 'ano',
            // 'fecha_process',
            // 'fecha_creation',


        ],
    ]); ?>
