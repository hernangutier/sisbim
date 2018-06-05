<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IncOrdenesCompras */

$this->title = 'Update Inc Ordenes Compras: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Inc Ordenes Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inc-ordenes-compras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
