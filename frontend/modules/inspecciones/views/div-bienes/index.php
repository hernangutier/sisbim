<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DivBienesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Div Bienes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="div-bienes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Div Bienes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ref',
            'tipo',
            'serial_carroceria',
            'serial_motor',
            //'placa',
            //'descripcion',
            //'is_operativo:boolean',
            //'observacion',
            //'id_insp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
