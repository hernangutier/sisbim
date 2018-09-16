<?php
use common\models\Bm3MasterDt;
use common\models\Bm3DetailSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bm3Master */



?>


<?php
$searchModel = new Bm3DetailSearch();
$searchModel->id_bm3=$model->id;
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
        'id'=>'grid-bm3',
      ],
  ],
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="fa fa-folder-open"></i> Detalles del Comprobante</h3>',
        'type'=>'info',

        'footer'=>false
    ],

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
          'attribute'=>'N° de Bien',
          'value'=>function($model){
            return $model->bien->codigo;
          }
        ],
        [
          'attribute'=>'Descripción',
          'value'=>function($model){
            return $model->bien->descripcion;
          }
        ],







    ],
]); ?>
