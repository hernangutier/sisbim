<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SaDesincBmMaster */

$this->title = 'Update Sa Desinc Bm Master: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sa Desinc Bm Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sa-desinc-bm-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
