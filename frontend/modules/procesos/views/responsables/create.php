<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Responsables */

$this->title = 'Crear Usuario Responsable';
$this->params['breadcrumbs'][] = ['label' => 'Administrar Usuarios Responsables', 'url' => ['index']];

?>

<div class="col-sm-offset-3 col-sm-6">
							<?= $this->render('_form', [
									'model' => $model,
							]) ?>


</div>
