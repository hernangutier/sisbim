<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BienesEnCustodia */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bienes En Custodias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-en-custodia-view">

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
            'num_bien',
            'descripcion',
            'id_lin',
            'id_class_sudebip',
            'status_fisico_sdb',
            'status_uso_sdb',
        ],
    ]) ?>

</div>
