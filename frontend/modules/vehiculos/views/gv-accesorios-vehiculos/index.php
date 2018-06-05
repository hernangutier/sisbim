<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GvAccesoriosVehiculosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gv Accesorios Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gv-accesorios-vehiculos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gv Accesorios Vehiculos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_veh',
            'descripcion',
            'serial',
            'en_uso:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
