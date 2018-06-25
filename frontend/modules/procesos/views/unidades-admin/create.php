<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UnidadesAdmin */

$this->title = 'Crear Unidad Administrativa';
$this->params['breadcrumbs'][] = ['label' => 'Unidades Administrativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
