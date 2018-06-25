<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GvAccesoriosVehiculos */

$this->title = 'Update Gv Accesorios Vehiculos: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Gv Accesorios Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gv-accesorios-vehiculos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
