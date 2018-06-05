<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactClientes */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-2 col-sm-7">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Cliente: <?= $model->cedrif ?>
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
