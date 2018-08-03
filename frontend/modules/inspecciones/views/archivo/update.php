<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IncOrdenesCompras */

$this->title = 'Actualizar Expediente N°: ' . $model->nexp;
$this->params['breadcrumbs'][] = ['label' => 'Archivo de Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">
  <div class="widget-box widget-color-blue2">
                        <div class="widget-header">
                          <h4 class="widget-title">Actualizar Expediente </h4>
                        </div>

                        <div class="widget-body">
                          <div class="widget-main no-padding">

              <?= $this->render('_form', [
                  'model' => $model,
              ]) ?>

            </div>
            </div>
            </div>


</div>
