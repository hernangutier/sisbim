<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PeriodosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'fini') ?>

    <?= $form->field($model, 'fclose') ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?php // echo $form->field($model, 'saldo_bm_ini') ?>

    <?php // echo $form->field($model, 'saldo_bu_ini') ?>

    <?php // echo $form->field($model, 'saldo_in_bm') ?>

    <?php // echo $form->field($model, 'saldo_in_bu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
