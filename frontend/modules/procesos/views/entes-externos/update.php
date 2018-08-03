<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Proveedores */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Entes Externos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-2 col-sm-7">
  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Ente Externo: <?= $model->rif ?>
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
