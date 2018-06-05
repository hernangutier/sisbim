<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NominasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nominas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <p>
        <?= Html::a('Crear Nomina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


              [
              'attribute'=>'codigo',
              'label'=>'Codigo',


              'value'=>function ($searchModel, $key, $index, $widget) {
                  return Html::a($searchModel->codigo,
                      ['view','id'=>$searchModel->id],
                      ['title'=>'Ver Datos de la Nomina' ]);
              },

              'format'=>'raw'
              ],
            'denominacion',
            'activo:boolean',
            'situacion_laboral',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
