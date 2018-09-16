<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Clasificacion */

$this->title = 'ActualizarClasificación: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Clasificaciones Pub. 21', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
