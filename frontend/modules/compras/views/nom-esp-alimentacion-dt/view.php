<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacionDt */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nom Esp Alimentacion Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nom-esp-alimentacion-dt-view">

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
            'id_nom',
            'id_int',
            'dias_lab',
            'dias_no_lab',
            'monto',
        ],
    ]) ?>

</div>
