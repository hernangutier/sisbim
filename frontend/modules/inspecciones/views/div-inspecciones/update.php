<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DivInspecciones */

$this->title = 'Update Div Inspecciones: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Div Inspecciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="div-inspecciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
