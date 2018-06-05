<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIniDt */

$this->title = 'Update Prov Inventario Ini Dt: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Prov Inventario Ini Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prov-inventario-ini-dt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
