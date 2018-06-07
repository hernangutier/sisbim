<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BienesEnCustodia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-en-custodia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_bien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_lin')->textInput() ?>

    <?= $form->field($model, 'id_class_sudebip')->textInput() ?>

    <?= $form->field($model, 'status_fisico_sdb')->textInput() ?>

    <?= $form->field($model, 'status_uso_sdb')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
