<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProvComprasDtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prov Compras Dts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prov-compras-dt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Prov Compras Dt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_art',
            'cnt',
            'is_mayor:boolean',
            'id_compra',
            //'cnt_pedida',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
