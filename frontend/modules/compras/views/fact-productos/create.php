<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FactProductos */
/* @var $price common\models\FactProductosPrecios */

$this->title = 'Registrar Productos';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-2 col-sm-7">

  <h3 class="header smaller lighter green">
                      <i class="ace-icon fa fa-file-o"></i>
                      Nuevo
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
        'price'=>$price,
    ]) ?>

</div>
