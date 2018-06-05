<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FactClientes */

$this->title = 'Ingresar Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
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
