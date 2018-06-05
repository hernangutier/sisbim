<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactMarcas */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Maestro Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-2 col-sm-7">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Marca: <?= $model->denominacion ?>
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
