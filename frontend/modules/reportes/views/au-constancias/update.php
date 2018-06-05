<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuConstancias */

$this->title = 'Update Au Constancias: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Au Constancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="au-constancias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
