<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\LastNomina;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Integrantes';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-list-alt"></i>
     Integrantes Nomina ( <?= common\models\LastNomina::findOne(['id'=>1])->idNom->denominacion  ?> )
  </h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
            'attribute'=>'cedrif',
            'label'=>'Cedula',


            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->cedrif,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos del Integrante' ]);
            },

            'format'=>'raw'
        ],

            'nombres',
            'apellidos',
            [
            'attribute'=>'Unidad Funcional',
            'value'=>'idUnd.denominacion',
            'filter' => Html::activeDropDownList($searchModel,
            'id_und', ArrayHelper::map(common\models\UnidadesAdmin::find()->asArray()->all(),
            'id', 'denominacion'),['class'=>'form-control','prompt' => 'No Filtro']),
           ],
           [
           'attribute'=>'Cargo',
           'value'=>'idCarg.denominacion',
           'filter' => Html::activeDropDownList($searchModel,
           'id_carg', ArrayHelper::map(common\models\Cargos::find()->asArray()->all(),
           'id', 'denominacion'),['class'=>'form-control','prompt' => 'No Filtro']),
         ],

            // 'tel_cel',
            // 'email:email',
            // 'status',
            // 'fnac',
            // 'create_date',
            // 'update_date',
            // 'sexo',
            // 'id_und',
            // 'id_nom',
            // 'id_carg',
            // 'id_prof',
            // 'tel_hab',
            // 'tel_otro',
            // 'lugar_nac',
            // 'edo_civil',
            // 'lateralidad',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',

                 //--------- Actualizar ---
             'buttons' => [




               'update' => function ($url,$searchModel) {
                 return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                            ['personal/update','id'=>$searchModel->id],

                            ['title'=>'Actualizar',
                            'class'=>'blue',
                           ]);
               },

               'delete' => function ($url, $model) {
                 return Html::a(Yii::t('app',''), ['personal/delete', 'id' => $model->id], [
                     'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                     'data' => [
                         'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Integrante: '.$model->cedrif ),
                         'method' => 'post',
                     ],
                 ]);


               },



             ],
            ],
        ],
    ]); ?>



</div>
