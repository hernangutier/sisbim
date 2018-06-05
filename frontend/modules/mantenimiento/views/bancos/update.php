<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bancos */

$this->title = 'Actualizar Bancos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
