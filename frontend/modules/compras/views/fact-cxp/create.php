<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FactCxp */

$this->title = 'Aperturar Registro de Compra';

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
