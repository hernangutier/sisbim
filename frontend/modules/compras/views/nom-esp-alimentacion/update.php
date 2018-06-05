<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacion */

$this->title = 'Update Nom Esp Alimentacion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nom Esp Alimentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nom-esp-alimentacion-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
