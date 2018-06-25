<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bienes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-view">

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
            'codigo',
            'serial',
            'id_inc',
            'dias_garantia',
            'id_resp_directo',
            'status',
            'costo',
            'notasigned',
            'observacion',
            'isvehicle',
            'id_vehicle',
            'foto:ntext',
            'id_und_actual',
            'isasigned',
            'descripcion:ntext',
            'marca',
            'id_clas',
            'fcreacion',
            'id_user',
            'operativo',
            'tipobien',
            'id_lin',
            'localizacion',
            'fdesinc',
            'pendientedesinc',
            'undmedida',
            'aplicaiva',
            'existe',
            'id_cat',
            'statusfisical',
            'disponibilidad',
            'foto1',
            'mantenimiento',
            'estado_uso',
            'estado_fisico',
            'old_cod',
            'activo',
            'is_colectivo:boolean',
            'motivo_indisponibilidad',
            'is_in:boolean',
            'is_asegurable:boolean',
            'id_color',
            'pend_in_mov:boolean',
            'aplica_garantia:boolean',
            'id_modelo',
            'etiquetar:boolean',
            'desincorporar:boolean',
            'no_ubicado:boolean',
            'barcode',
            'bm3:boolean',
            'tipo_indisponibilidad',
        ],
    ]) ?>

</div>
