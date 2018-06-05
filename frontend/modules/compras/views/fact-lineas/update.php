<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactLineas */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Maestro Lineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-2 col-sm-7">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Linea: <?= $model->denominacion ?>
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
