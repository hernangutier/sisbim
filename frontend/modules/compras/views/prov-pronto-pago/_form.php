<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProvProntoPago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prov-pronto-pago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prov')->textInput() ?>

    <?= $form->field($model, 'lim_inf')->textInput() ?>

    <?= $form->field($model, 'lim_sup')->textInput() ?>

    <?= $form->field($model, 'percent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
