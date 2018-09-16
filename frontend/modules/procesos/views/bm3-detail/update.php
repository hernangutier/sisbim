<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bm3Detail */

$this->title = 'Update Bm3 Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bm3 Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bm3-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
