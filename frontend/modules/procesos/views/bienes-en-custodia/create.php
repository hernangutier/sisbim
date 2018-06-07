<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BienesEnCustodia */

$this->title = 'Create Bienes En Custodia';
$this->params['breadcrumbs'][] = ['label' => 'Bienes En Custodias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-en-custodia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
