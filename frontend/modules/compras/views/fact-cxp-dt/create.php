<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FactCxpDt */

$this->title = 'Create Fact Cxp Dt';
$this->params['breadcrumbs'][] = ['label' => 'Fact Cxp Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fact-cxp-dt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
