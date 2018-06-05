<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EscalasSalariales */

$this->title = 'Crear Escala Salarial';
$this->params['breadcrumbs'][] = ['label' => 'Escalas Salariales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
  <h3 class="header smaller lighter green">
    <i class="ace-icon fa fa-file-o"></i>
      Nuevo
  </h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
