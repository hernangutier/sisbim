<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SaOrdenesSalidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sa Ordenes Salidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-ordenes-salida-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sa Ordenes Salida', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'motivo',
            'id_resp',
            'motivo_descripcion',
            'date_creation',
            //'status',
            //'id_user',
            //'max_dias',
            //'ncontrol',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
