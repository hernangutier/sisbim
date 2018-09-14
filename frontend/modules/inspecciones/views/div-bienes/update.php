<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DivBienes */

$this->title = 'Update Div Bienes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Div Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="div-bienes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
