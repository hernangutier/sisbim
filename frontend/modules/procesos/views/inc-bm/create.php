<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IncBm */

$this->title = 'Nueva Incoporacion de Bienes Muebles';
$this->params['breadcrumbs'][] = ['label' => 'Inc Bms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
