<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EscalasSalarialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escalas Salariales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <p>
        <?= Html::a('Crear Escala Salarial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'escala',
            [
            'attribute'=>'Sueldo',
            'value'=> function ($model){
              return '<h4 class="blue">'. number_format($model->sueldo,2)   . ' Bsf.</h4>';
            },
            'format'=>'raw',

          ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
