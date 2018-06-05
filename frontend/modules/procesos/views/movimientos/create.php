<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Movimientos */

$this->title = 'Nuevo Traslado';
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="col-sm-offset-3 col-sm-6">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
