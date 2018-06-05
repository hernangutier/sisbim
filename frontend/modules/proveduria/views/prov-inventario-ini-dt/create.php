<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIniDt */

$this->title = 'Create Prov Inventario Ini Dt';
$this->params['breadcrumbs'][] = ['label' => 'Prov Inventario Ini Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prov-inventario-ini-dt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
