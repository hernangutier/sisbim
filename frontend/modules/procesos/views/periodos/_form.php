<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Periodos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fini')->textInput() ?>

    <?= $form->field($model, 'fclose')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'saldo_bm_ini')->textInput() ?>

    <?= $form->field($model, 'saldo_bu_ini')->textInput() ?>

    <?= $form->field($model, 'saldo_in_bm')->textInput() ?>

    <?= $form->field($model, 'saldo_in_bu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
