<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIniSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prov-inventario-ini-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'fecha_creation') ?>

    <?= $form->field($model, 'fecha_cierre') ?>

    <?= $form->field($model, 'motivo') ?>

    <?php // echo $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
