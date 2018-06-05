<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CargosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion de Cargos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


    <p>
        <?= Html::a('Crear Cargo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
            'attribute'=>'codigo',
            'label'=>'Código',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codigo,
                    ['view','id'=>$searchModel->id],
                    ['title'=>'Ver Datos' ]);
            },

            'format'=>'raw'
            ],
            'denominacion',


            [  'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{update}',
                // 'dropdown' => true,
                'buttons' => [

                  'delete' => function ($url, $model) {
                    return Html::a(Yii::t('app',''), ['cargos/delete', 'id' => $model->id], [
                        'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                        'data' => [
                            'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Cargo: '.$model->denominacion ),
                            'method' => 'post',
                        ],
                    ]);


                  },



                  'update' => function ($url, $model) {
                    return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                               ['cargos/update','id'=>$model->id],

                               ['title'=>'Actualizar',
                               'class'=>'blue',
                              ]);
                  },
              ],
            ],

              ],

    ]); ?>
</div>
