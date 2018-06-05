<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalPermisosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-permisos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_int') ?>

    <?= $form->field($model, 'motivo') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'is_remunerable')->checkbox() ?>

    <?php // echo $form->field($model, 'is_justificado')->checkbox() ?>

    <?php // echo $form->field($model, 'fini') ?>

    <?php // echo $form->field($model, 'fend') ?>

    <?php // echo $form->field($model, 'f_creation') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_dias_laborales')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
