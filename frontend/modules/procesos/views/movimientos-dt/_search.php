<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MovimientosDtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimientos-dt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_bien') ?>

    <?= $form->field($model, 'id_mov') ?>

    <?= $form->field($model, 'id_user_old') ?>

    <?= $form->field($model, 'id_user_new') ?>

    <?php // echo $form->field($model, 'estado_uso') ?>

    <?php // echo $form->field($model, 'estado_fisico') ?>

    <?php // echo $form->field($model, 'id_und_destino') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
