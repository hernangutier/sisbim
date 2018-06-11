<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IncBm */

$this->title = 'Update Inc Bm: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Inc Bms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inc-bm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
