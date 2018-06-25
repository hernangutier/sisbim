<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IncOrdenesCompras */

$this->title = 'Nueva Orden de Compra';
$this->params['breadcrumbs'][] = ['label' => 'Historico de Ordenes de Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
