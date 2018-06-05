<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactProductos */
/* @var $price common\models\FactProductosPrecios */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Producto: <?= $model->ref ?>
  </h3>
    <?= $this->render('_form', [
        'model' => $model,
        'price'=>$price
    ]) ?>

</div>
