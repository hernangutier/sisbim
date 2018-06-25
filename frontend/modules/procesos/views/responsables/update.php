<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Responsables */

$this->title = 'Actualizar Usuario Responsable: ' . ' ' . $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => 'Administrar Usuarios Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
                  'model' => $model,
              ]) ?>


</div>
