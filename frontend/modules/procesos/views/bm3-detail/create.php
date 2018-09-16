<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bm3Detail */

$this->title = 'Create Bm3 Detail';
$this->params['breadcrumbs'][] = ['label' => 'Bm3 Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bm3-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
