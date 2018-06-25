<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bm3 */

$this->title = 'Update Bm3: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Bm3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bm3-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
