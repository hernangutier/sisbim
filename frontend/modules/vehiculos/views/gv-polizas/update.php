<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GvPolizas */

$this->title = 'Update Gv Polizas: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Gv Polizas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gv-polizas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
