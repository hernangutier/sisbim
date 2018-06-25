<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DivSemovientes */

$this->title = 'Create Div Semovientes';
$this->params['breadcrumbs'][] = ['label' => 'Div Semovientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="div-semovientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
