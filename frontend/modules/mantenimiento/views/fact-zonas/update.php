<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactZonas */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Fact Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="col-sm-offset-2 col-sm-7">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Zona: <?= $model->ref ?>
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
