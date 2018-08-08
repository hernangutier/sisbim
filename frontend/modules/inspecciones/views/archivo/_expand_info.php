<?php
use common\models\ArchivoDocumentos;
use common\models\ArchivoDocumentosSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\helpers\Html;
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
        'id'=>'grid-accesorios',
      ],
  ],
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="fa fa-folder-open"></i> Documentos del Expediente</h3>',
        'type'=>'info',

        'footer'=>false
    ],

  'showPageSummary' => true,
    'columns' => [
        ['class' => '\kartik\grid\SerialColumn'],
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
          'format' => ['decimal', 2],
          'pageSummary' => true
        ]




    ],
]); ?>
