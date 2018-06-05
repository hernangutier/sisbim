<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedrif') ?>

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'apellidos') ?>

    <?= $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'tel_cel') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'fnac') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'id_und') ?>

    <?php // echo $form->field($model, 'id_nom') ?>

    <?php // echo $form->field($model, 'id_carg') ?>

    <?php // echo $form->field($model, 'id_prof') ?>

    <?php // echo $form->field($model, 'tel_hab') ?>

    <?php // echo $form->field($model, 'tel_otro') ?>

    <?php // echo $form->field($model, 'lugar_nac') ?>

    <?php // echo $form->field($model, 'edo_civil') ?>

    <?php // echo $form->field($model, 'lateralidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
