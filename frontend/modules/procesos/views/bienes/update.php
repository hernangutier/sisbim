<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bienes */

$this->title = 'Update Bienes: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bienes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
