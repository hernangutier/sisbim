<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalPermisos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-permisos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_int',
            'motivo',
            'tipo',
            'is_remunerable:boolean',
            'is_justificado:boolean',
            'fini',
            'fend',
            'f_creation',
            'id_user',
            'status',
            'is_dias_laborales:boolean',
        ],
    ]) ?>

</div>
