<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EscalasSalariales */

$this->title = 'Actualizar Escala Salarial: ' . $model->escala;
$this->params['breadcrumbs'][] = ['label' => 'Escalas Salariales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Escala: <?= $model->escala ?>
  </h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
