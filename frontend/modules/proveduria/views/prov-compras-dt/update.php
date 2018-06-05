<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProvComprasDt */

$this->title = 'Update Prov Compras Dt: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Prov Compras Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prov-compras-dt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
