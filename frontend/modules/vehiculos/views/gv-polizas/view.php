<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GvPolizas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gv Polizas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gv-polizas-view">

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
            'id_aseguradora',
            'otra_aseguradora',
            'npoliza',
            'monto',
            'tipo',
            'moneda',
            'especifique_moneda',
            'f_ini',
            'f_fin',
            'resp_civil',
            'tipo_cobertura',
            'especifique_tipo_cobertura',
            'descripcion_cobertura',
            'id_bien',
            'active:boolean',
            'id',
            'observaciones',
            'f_nulls',
            'status',
            'id_user',
        ],
    ]) ?>

</div>
