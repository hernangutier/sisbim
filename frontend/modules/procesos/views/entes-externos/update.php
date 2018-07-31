<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntesExternos */

$this->title = 'Update Entes Externos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entes Externos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entes-externos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
