<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProvProntoPago */

$this->title = 'Create Prov Pronto Pago';
$this->params['breadcrumbs'][] = ['label' => 'Prov Pronto Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prov-pronto-pago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
