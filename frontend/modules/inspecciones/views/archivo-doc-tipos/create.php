<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ArchivoDocTipos */

$this->title = 'Nuevo Tipo de Documentos';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">

  <div class="widget-box widget-color-green">
  											<div class="widget-header">
  												<h4 class="widget-title">Nuevo Tipo de Documento </h4>
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
