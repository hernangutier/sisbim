<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProvProntoPago */

$this->title = 'Update Prov Pronto Pago: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prov Pronto Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prov-pronto-pago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
