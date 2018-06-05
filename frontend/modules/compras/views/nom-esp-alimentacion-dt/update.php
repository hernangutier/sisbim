<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacionDt */

$this->title = 'Update Nom Esp Alimentacion Dt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nom Esp Alimentacion Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nom-esp-alimentacion-dt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
