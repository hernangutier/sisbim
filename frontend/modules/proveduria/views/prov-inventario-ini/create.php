<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIni */

$this->title = 'Create Prov Inventario Ini';
$this->params['breadcrumbs'][] = ['label' => 'Prov Inventario Inis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prov-inventario-ini-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
