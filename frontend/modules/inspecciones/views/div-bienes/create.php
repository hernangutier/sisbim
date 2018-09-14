<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DivBienes */

$this->title = 'Create Div Bienes';
$this->params['breadcrumbs'][] = ['label' => 'Div Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="div-bienes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
