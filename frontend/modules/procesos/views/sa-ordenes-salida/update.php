<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SaOrdenesSalida */

$this->title = 'Update Sa Ordenes Salida: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sa Ordenes Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sa-ordenes-salida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
