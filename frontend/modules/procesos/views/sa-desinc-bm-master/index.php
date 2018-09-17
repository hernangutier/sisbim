<?php
use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\MovimientosDtSearch;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SaDesincBmMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion de Propuestas de Enajenación';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo Dialog::widget(); ?>


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
              'id'=>'grid-propuestas',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-history "></i> Gestion de Propuestas de Enajenación</h3>',
              'type'=>'info',


              'footer'=>true,
          ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{admin}',
                            'buttons' => [
                              'admin' => function ($url, $model, $key) {
                                  return (($model->status==0) ? Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-wrench bigger-120"></i></span> ',
                                      Url::to(['sa-desinc-bm-master/view','id'=>$model->id]), [
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'Administrar'),

                                  ]) : '' );
                              },
                      ],
              ],
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
              'attribute'=>'ncontrol',
              'value'=>function ($searchModel){
                return '<span class="badge badge-info"><b/>' . $searchModel->getNControlFormat() . '</span>';
              },
              'format'=>'raw',

            ],
            'date_creation',
            [
              'attribute'=>'id',
              'label'=>'Descripcion',
              'value'=>function ($searchModel){
                return $searchModel->observaciones;
              }
            ],

            [
                'attribute'=>'id_conc',
                'value'=>function ($searchModel){
                  return '<span class="badge badge-info"><b>' . $searchModel->concepto->descripcion . '</b></span>';
                },
                'format'=>'raw',
                'filter' => Html::activeDropDownList($searchModel,
                'id_conc', ArrayHelper::map(common\models\SaDesincConceptos::find()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],




            [
              'attribute'=>'status',
              'value'=>function ($searchModel){
                return $searchModel->getStatusHtml();
              },
              'format'=>'raw',
              'filter' => Html::activeDropDownList($searchModel,
              'status', ['0'=>'en Propuesta','1'=>'Propuesta Enajenada','2'=>'Propuesta Anulada'],['class'=>'form-control','prompt' => 'No Filtro']),

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
