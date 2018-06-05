<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProvCompras */

$this->title = 'Update Prov Compras: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prov Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prov-compras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
