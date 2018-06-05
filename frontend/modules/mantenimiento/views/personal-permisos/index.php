<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PersonalPermisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Permisos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-permisos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personal Permisos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_int',
            'motivo',
            'tipo',
            'is_remunerable:boolean',
            // 'is_justificado:boolean',
            // 'fini',
            // 'fend',
            // 'f_creation',
            // 'id_user',
            // 'status',
            // 'is_dias_laborales:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
