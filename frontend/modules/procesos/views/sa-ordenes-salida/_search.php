<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaOrdenesSalidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sa-ordenes-salida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'motivo') ?>

    <?= $form->field($model, 'id_resp') ?>

    <?= $form->field($model, 'motivo_descripcion') ?>

    <?= $form->field($model, 'date_creation') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'max_dias') ?>

    <?php // echo $form->field($model, 'ncontrol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
