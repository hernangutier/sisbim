<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\SbdCategoriasEsp;
use  yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\BienesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bienes');
$this->params['breadcrumbs'][] = $this->title;
?>



  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
    <?= ($searchModel->tipobien==0) ?  'Consultar Registro Activo de Bienes Muebles' : 'Consultar Registro Activo  Bienes de Uso' ?>
  </h3>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>false,
            'options'=>[
              'id'=>'grid-bienes',
            ],
        ],
        'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="ace-icon fa  	fa-comments"></i> Consultar Registro de Bienes Muebles</h3>',
              'type'=>'info',


              'footer'=>false
          ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            [
            'attribute'=>'codigo',
            'label'=>'N° de Bien',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codigo,
                    ['view-resumen','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Bien' ]);
            },

            'format'=>'raw'
            ],
            'old_cod',

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





            // 'codresp_directo',
            // 'status',
            // 'costo',
            // 'notasigned',
            // 'observacion',
            // 'isvehicle',
            // 'codvehicle',
            // 'foto:ntext',
            // 'cod_und_actual',
            // 'isasigned',
            // 'descripcion:ntext',
            // 'marca',
            // 'codclas',
            // 'fcreacion',
            // 'coduser',
            // 'operativo',
            // 'tipobien',
            // 'codlin',
            // 'localizacion',
            // 'fdesinc',
            // 'pendientedesinc',
            // 'undmedida',
            // 'aplicaiva',
            // 'existe',
            // 'codcat',
            // 'statusfisical',
            // 'disponibilidad',
            // 'foto1',
            // 'mantenimiento',
            // 'estado_uso',
            // 'estado_fisico',
            // 'old_cod',
            // 'activo',
            // 'is_colectivo:boolean',

        ],
    ]); ?>
