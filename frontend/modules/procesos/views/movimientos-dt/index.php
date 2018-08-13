<?php

use kartik\helpers\Html;
use kartik\helpers\Enum;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MovimientosDtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relacion de Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
     $this->registerJs('
      $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
           window.history.pushState(null, "", window.location.href);
         };
       })

     ');
 ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-movimientos-dt',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-archive"></i> Relacion de Movimientos Bienes</h3>',
              'type'=>'info',


              'footer'=>true,
          ],
          'toolbar' => [
        [
            'content'=>

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
              'attribute'=>'id_mov',
              'label'=>'N° de Control',
              'value'=>function($model){
                return $model->idMov->ncontrol;
              }
            ],
            [
              'attribute'=>'id_bien',
              'label'=>'Referencia',
              'value'=>function($model){
                return $model->idBien->codigo;
              }
            ],
            [
              'attribute'=>'id_bien',
              'label'=>'Descripción',
              'value'=>function($model){
                return $model->idBien->descripcion;
              }
            ],
            [
              'attribute'=>'id_mov',
              'label'=>'Origen',
              'value'=>function($model){
                return $model->idMov->idUndOrigen->descripcion;
              }
            ],
            [
              'attribute'=>'id_und_destino',
              'label'=>'Destino',
              'value'=>function($model){
                return isset($model->idUndDestino) ? $model->idUndDestino->descripcion : $model->idUndOrigen->descripcion;
              }
            ],
            'id_user_old',
            'id_user_new',
            // 'estado_uso',
            // 'estado_fisico',
            // 'id_und_destino',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
