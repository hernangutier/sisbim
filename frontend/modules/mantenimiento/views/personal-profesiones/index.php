<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PersonalProfesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profesiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <p>
        <?= Html::a('Crear Profesion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'denominacion',

            [  'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{update}',
                // 'dropdown' => true,
                'buttons' => [

                  'delete' => function ($url, $model) {
                    return Html::a(Yii::t('app',''), ['personal-profesiones/delete', 'id' => $model->id], [
                        'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                        'data' => [
                            'confirm' => Yii::t('app', 'Estas Seguro de Eliminar la Profesión: '.$model->denominacion ),
                            'method' => 'post',
                        ],
                    ]);


                  },



                  'update' => function ($url, $model) {
                    return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                               ['personal-profesiones/update','id'=>$model->id],

                               ['title'=>'Actualizar',
                               'class'=>'blue',
                              ]);
                  },
              ],
            ],
        ],
    ]); ?>
</div>
