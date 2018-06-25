<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIniDt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prov-inventario-ini-dt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_inv')->textInput() ?>

    <?= $form->field($model, 'id_art')->textInput() ?>

    <?= $form->field($model, 'cnt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
