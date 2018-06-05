<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalPermisos */

$this->title = 'Update Personal Permisos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-permisos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
