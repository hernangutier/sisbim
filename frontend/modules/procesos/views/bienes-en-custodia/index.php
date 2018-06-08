<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\SbdCategoriasEsp;
use  yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\BienesEnCustodiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bienes en Custodia o Prestamo');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
    Consultar Registro Activo de Bienes Muebles en Custodia o Cuido
  </h3>




    <?php Pjax::begin(); ?>
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
                    ['view-resumen','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Bien' ]);
            },

            'format'=>'raw'
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
                'attribute'=>'Estado Uso (SUDEBIP)',
                'value'=>function($model){
                  if (is_null($model->status_uso_sdb)){
                    return '';
                  }  else {
                      return $model->getEstadoUso();
                  }

                },
                'filter' => Html::activeDropDownList($searchModel,
                'status_uso_sdb', ArrayHelper::map(common\models\Bienes::getListEstadosUso(),
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
    <?php Pjax::end(); ?>

</div>
