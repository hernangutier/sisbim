<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DivSemovientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="div-semovientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_insp') ?>

    <?= $form->field($model, 'nbov') ?>

    <?= $form->field($model, 'categoria') ?>

    <?= $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'is_herrado')->checkbox() ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'date_creation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
