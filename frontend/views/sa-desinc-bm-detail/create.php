<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SaDesincBmDetail */

$this->title = 'Create Sa Desinc Bm Detail';
$this->params['breadcrumbs'][] = ['label' => 'Sa Desinc Bm Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-desinc-bm-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
