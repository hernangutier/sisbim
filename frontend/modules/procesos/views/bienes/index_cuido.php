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

$this->title = Yii::t('app', 'Bienes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
    <?= ($searchModel->tipobien==0) ?  'Consultar Registro Activo de Bienes Muebles en Cuido' : 'Consultar Registro Activo  Bienes de Uso' ?>
  </h3>

  <p>
    <div class="btn-group">
      <?= Html::a('Registrar Bien', ['create'], ['class' => 'btn btn-success']) ?>
      <?= Html::a('<i class="ace-icon fa fa-file-pdf-o bigger-125"></i>'.'Listado PDF',  Url::to('/sisbim/report/unidades_funcionales.php') , ['class' => 'btn btn-info']) ?>
    </div>

  </p>


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
    <?php Pjax::end(); ?>

</div>
