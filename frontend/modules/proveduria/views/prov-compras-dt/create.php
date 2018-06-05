<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProvComprasDt */

$this->title = 'Create Prov Compras Dt';
$this->params['breadcrumbs'][] = ['label' => 'Prov Compras Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prov-compras-dt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
