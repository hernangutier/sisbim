<?php
use common\models\MovimientosDt;
use common\models\MovimientosDtSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Movimientos */



?>


<?php
$searchModel = new MovimientosDtSearch();
$searchModel->id_mov=$model->id;
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
        'id'=>'grid-movimientos-dt',
      ],
  ],
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="fa fa-folder-open"></i> Detalles del Movimiento</h3>',
        'type'=>'info',

        'footer'=>false
    ],

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
          'attribute'=>'N° de Bien',
          'value'=>function($model){
            return $model->idBien->codigo;
          }
        ],
        [
          'attribute'=>'Descripción',
          'value'=>function($model){
            return $model->idBien->descripcion;
          }
        ],

        [

          'attribute'=>'id_und_destino',
          'value'=>function($model){
            return isset($model->idUndDestino) ? $model->idUndDestino->descripcion : 'Sin Información';
          }
        ],

        [

          'attribute'=>'id_user_new',
          'value'=>function($model){
            return isset($model->idUser1) ? $model->idUser1->getNombreCompleto()  : 'Sin Información';
          }
        ],



    ],
]); ?>
