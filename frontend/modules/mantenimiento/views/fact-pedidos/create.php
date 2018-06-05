<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FactPedidos */

$this->title = 'Create Fact Pedidos';
$this->params['breadcrumbs'][] = ['label' => 'Fact Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fact-pedidos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
