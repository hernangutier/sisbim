<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DivBienesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="div-bienes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'serial_carroceria') ?>

    <?= $form->field($model, 'serial_motor') ?>

    <?php // echo $form->field($model, 'placa') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'is_operativo')->checkbox() ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'id_insp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
