<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cargos */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


          <h3 class="header smaller lighter blue">
            <i class="ace-icon fa  fa-refresh"></i>
             Actualizar Cargo: <?= $model->codigo ?>
          </h3>

                  <div class="widget-body">
                    <div class="widget-main">

                              <?= $this->render('_form', [
                                  'model' => $model,
                              ]) ?>

                      </div>
  								 </div>
  					</div>
