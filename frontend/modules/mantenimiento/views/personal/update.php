<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Personal */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Integrantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-refresh"></i>
     Actualizar Integrante: <?= $model->cedrif ?>
  </h3>

          <div class="widget-body">
            <div class="widget-main">

                              <?= $this->render('_form', [
                                  'model' => $model,
                              ]) ?>
                              </div>
                          </div>
  </div>
