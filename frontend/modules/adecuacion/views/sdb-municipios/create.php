<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ArchivoUbicaciones */

$this->title = 'Crear Municipio (SUDEBIP)';
$this->params['breadcrumbs'][] = ['label' => 'Municipios (SUDEBIP)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">

  <div class="widget-box widget-color-green">
  											<div class="widget-header">
  												<h4 class="widget-title">Nuevo Municipio (SUDEBIP) </h4>
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
