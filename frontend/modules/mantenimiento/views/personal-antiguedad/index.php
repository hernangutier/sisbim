<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PersonalAntiguedadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Antiguedads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-antiguedad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personal Antiguedad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_int',
            'procedencia',
            'anos',
            'meses',
            // 'dias',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
