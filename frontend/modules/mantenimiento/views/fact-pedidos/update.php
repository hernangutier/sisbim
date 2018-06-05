<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactPedidos */

$this->title = 'Update Fact Pedidos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fact Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fact-pedidos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
