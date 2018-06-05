<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FactMedidas */

$this->title = 'Create Fact Medidas';
$this->params['breadcrumbs'][] = ['label' => 'Fact Medidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fact-medidas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
