<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FactCxpDt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fact-cxp-dt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_compra')->textInput() ?>

    <?= $form->field($model, 'id_prod')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'cant')->textInput() ?>

    <?= $form->field($model, 'is_mayor')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
