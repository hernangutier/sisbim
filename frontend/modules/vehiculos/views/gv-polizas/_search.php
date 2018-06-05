<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GvPolizasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gv-polizas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_aseguradora') ?>

    <?= $form->field($model, 'otra_aseguradora') ?>

    <?= $form->field($model, 'npoliza') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'moneda') ?>

    <?php // echo $form->field($model, 'especifique_moneda') ?>

    <?php // echo $form->field($model, 'f_ini') ?>

    <?php // echo $form->field($model, 'f_fin') ?>

    <?php // echo $form->field($model, 'resp_civil') ?>

    <?php // echo $form->field($model, 'tipo_cobertura') ?>

    <?php // echo $form->field($model, 'especifique_tipo_cobertura') ?>

    <?php // echo $form->field($model, 'descripcion_cobertura') ?>

    <?php // echo $form->field($model, 'id_bien') ?>

    <?php // echo $form->field($model, 'active')->checkbox() ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'f_nulls') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
