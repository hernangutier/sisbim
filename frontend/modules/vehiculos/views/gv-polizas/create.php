<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GvPolizas */

$this->title = 'Create Gv Polizas';
$this->params['breadcrumbs'][] = ['label' => 'Gv Polizas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gv-polizas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
