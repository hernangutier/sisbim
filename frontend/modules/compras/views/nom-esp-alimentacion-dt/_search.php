<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacionDtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nom-esp-alimentacion-dt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_nom') ?>

    <?= $form->field($model, 'id_int') ?>

    <?= $form->field($model, 'dias_lab') ?>

    <?= $form->field($model, 'dias_no_lab') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
