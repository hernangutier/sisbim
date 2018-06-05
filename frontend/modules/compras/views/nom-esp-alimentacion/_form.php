<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nom-esp-alimentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user_create')->textInput() ?>

    <?= $form->field($model, 'id_user_revisa')->textInput() ?>

    <?= $form->field($model, 'id_user_procesa')->textInput() ?>

    <?= $form->field($model, 'f_create')->textInput() ?>

    <?= $form->field($model, 'f_revisa')->textInput() ?>

    <?= $form->field($model, 'f_aprueba')->textInput() ?>

    <?= $form->field($model, 'is_proxima')->checkbox() ?>

    <?= $form->field($model, 'id_periodo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
