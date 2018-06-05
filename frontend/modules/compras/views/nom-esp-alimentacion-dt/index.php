<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NomEspAlimentacionDtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
            'attribute'=>'cedrif',
            'label'=>'Cedula',


            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->idInt->cedrif,
                    ['view','id'=>$searchModel->idInt->cedrif],
                    ['title'=>'Ver Datos del Integrante' ]);
            },

            'format'=>'raw'
        ],
        [
        'attribute'=>'cedrif',
        'label'=>'Nombres y Apellidos',


        'value'=>function ($searchModel, $key, $index, $widget) {
            return $searchModel->idInt->getNombreComplete();

        },

        'format'=>'raw'
    ],



            'dias_lab',
            'dias_no_lab',
            'monto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
