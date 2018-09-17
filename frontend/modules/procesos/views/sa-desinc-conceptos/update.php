<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lineas */

$this->title = 'Actualizar Concepto de Desincorporación: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Conceptos de Desincorporación Pub. 21', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
