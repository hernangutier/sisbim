<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Nominas */

$this->title = 'Crear Nomina';
$this->params['breadcrumbs'][] = ['label' => 'Gestion de Nominas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <div class="widget-box">
  												<div class="widget-header">
  													<h4 class="widget-title">
  														<i class="ace-icon fa fa-tint"></i>
  														Nuevo
  													</h4>
  												</div>

  												<div class="widget-body">
  													<div class="widget-main">

                              <?= $this->render('_form', [
                                  'model' => $model,
                              ]) ?>

                              </div>
  												</div>
  					</div>

</div>
