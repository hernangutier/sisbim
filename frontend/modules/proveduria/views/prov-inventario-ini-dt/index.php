<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProvInventarioIniDtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prov Inventario Ini Dts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prov-inventario-ini-dt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Prov Inventario Ini Dt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_inv',
            'id_art',
            'cnt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
