<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */

$this->title = 'Crear Proveedor';
$this->params['breadcrumbs'][] = ['label' => 'Administrar Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
