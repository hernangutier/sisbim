<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProvArtLineas */

$this->title = 'Create Prov Art Lineas';
$this->params['breadcrumbs'][] = ['label' => 'Prov Art Lineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prov-art-lineas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
