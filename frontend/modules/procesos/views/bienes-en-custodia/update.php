<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BienesEnCustodia */

$this->title = 'Update Bienes En Custodia: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Bienes En Custodias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bienes-en-custodia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
