<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactVendedores */

$this->title = 'Actualizar Vendedor: ' . $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => 'Vendedores', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-2 col-sm-7">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Vendedor: <?= $model->cedrif ?>
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
