<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SaOrdenesSalida */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sa Ordenes Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-ordenes-salida-view">

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
            'motivo',
            'id_resp',
            'motivo_descripcion',
            'date_creation',
            'status',
            'id_user',
            'max_dias',
            'ncontrol',
        ],
    ]) ?>

</div>
