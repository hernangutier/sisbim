<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GvAccesoriosVehiculos */

$this->title = 'Create Gv Accesorios Vehiculos';
$this->params['breadcrumbs'][] = ['label' => 'Gv Accesorios Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gv-accesorios-vehiculos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
