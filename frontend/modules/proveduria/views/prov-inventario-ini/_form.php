<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIni */
/* @var $new_model common\models\ProvInventarioIni */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prov-inventario-ini-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'fecha_creation')->textInput() ?>

    <?= $form->field($model, 'fecha_cierre')->textInput() ?>

    <?= $form->field($model, 'motivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
