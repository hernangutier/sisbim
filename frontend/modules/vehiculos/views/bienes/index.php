<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\SbdCategoriasEsp;
use  yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\BienesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registro de Parque Automotor');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



<div class="row">
  <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" style="min-height: 212.133px;">
                  <div class="widget-box widget-color-blue2">
                    <div class="widget-header">
                      <h5 class="widget-title"> <b>Registro de Parque Automotor</b></h5>

                      <div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
													</a>



												</div>

                        <div class="widget-toolbar ">

                        </div>





                    </div>

                    <div class="widget-body">
                      <div class="widget-main">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            [
            'attribute'=>'codigo',
            'label'=>'N° de Bien',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codigo,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Vehiculo' ]);
            },

            'format'=>'raw'
            ],
            [
              'attribute'=>'id',
              'label'=>'Placa',
              'value'=>function($searchModel){
                return $searchModel->vehicle->placa;
              }
            ],

            'descripcion',
            [
                'attribute'=>'Ubicacion Actual',
                'value'=>function($model){
                  return $model->idUndActual->descripcion;
                },
                'filter' => Html::activeDropDownList($searchModel,
                'id_und_actual', ArrayHelper::map(common\models\UnidadesAdmin::find()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],

            [
                'attribute'=>'Responsable',
                'value'=>function($model){
                  return (is_null($model->idresp) ?  ($model->is_colectivo) ? ' Uso Colectivo ' :   'No asignado' : $model->idresp->nombres . ' ' . $model->idresp->apellidos);
                },
                'filter' => Html::activeDropDownList($searchModel,
                'id_resp_directo', ArrayHelper::map(common\models\Responsables::find()->all(),
                'id', 'nombres'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],

            [
                'attribute'=>'Linea',
                'value'=>function($model){
                  return $model->idlin0->descripcion;
                },
                'filter' => Html::activeDropDownList($searchModel,
                'id_lin', ArrayHelper::map(common\models\Lineas::find()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],
            [
                'attribute'=>'Categoria (SUDEBIP)',
                'value'=>function($model){
                  if (is_null($model->idcat0)){
                    return '';
                  }  else {
                      return $model->idcat0->descripcion;
                  }

                },
                'filter' => Html::activeDropDownList($searchModel,
                'id_cat', ArrayHelper::map(common\models\SdbCategoriasEsp::find()->all(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],

            [
                'attribute'=>'Estado Uso (SUDEBIP)',
                'value'=>function($model){
                  if (is_null($model->estado_uso)){
                    return '';
                  }  else {
                      return $model->getEstadoUso();
                  }

                },
                'filter' => Html::activeDropDownList($searchModel,
                'estado_uso', ArrayHelper::map(common\models\Bienes::getListEstadosUso(),
                'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],



        ],
    ]); ?>

  </div>
</div>
</div>
</div>
</div>



</div>
