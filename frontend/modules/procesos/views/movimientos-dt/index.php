<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MovimientosDtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimientos Dts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-dt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Movimientos Dt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_bien',
            'id_mov',
            'id_user_old',
            'id_user_new',
            // 'estado_uso',
            // 'estado_fisico',
            // 'id_und_destino',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
