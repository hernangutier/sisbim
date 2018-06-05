<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacionDt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nom-esp-alimentacion-dt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_nom')->textInput() ?>

    <?= $form->field($model, 'id_int')->textInput() ?>

    <?= $form->field($model, 'dias_lab')->textInput() ?>

    <?= $form->field($model, 'dias_no_lab')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
