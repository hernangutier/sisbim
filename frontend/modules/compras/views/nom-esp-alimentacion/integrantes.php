<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\grid\GridView;
use common\models\NomEspAlimentacionDt;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacion */


?>


<?php
$searchModel = new NomEspAlimentacionDt();
$searchModel->id_nom=$model->id;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

?>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
        'attribute'=>'id_int',
        'label'=>'Cedula',
        'hAlign'=>GridView::ALIGN_CENTER,

        'value'=>function ($searchModel, $key, $index, $widget) {
            return Html::a($searchModel->cedrif,
                ['view','id'=>$searchModel->idInt->cedrif],
                ['title'=>'Ver Datos del Integrante' ]);
        },

        'format'=>'raw'
    ],


        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
