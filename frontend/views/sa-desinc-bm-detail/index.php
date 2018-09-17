<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SaDesincBmDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sa Desinc Bm Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-desinc-bm-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sa Desinc Bm Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_des',
            'id_bien',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
