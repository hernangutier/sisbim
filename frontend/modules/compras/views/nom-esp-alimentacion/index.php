<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NomEspAlimentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nom Esp Alimentacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nom-esp-alimentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nom Esp Alimentacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'id_user_create',
            'id_user_revisa',
            'id_user_procesa',
            // 'f_create',
            // 'f_revisa',
            // 'f_aprueba',
            // 'is_proxima:boolean',
            // 'id_periodo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
