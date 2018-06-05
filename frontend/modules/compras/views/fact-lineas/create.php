<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FactLineas */

$this->title = 'Ingresar Linea';
$this->params['breadcrumbs'][] = ['label' => 'Maestro de Lineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-2 col-sm-7">


  <h3 class="header smaller lighter green">
                      <i class="ace-icon fa fa-file-o"></i>
                      Nuevo
  </h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
