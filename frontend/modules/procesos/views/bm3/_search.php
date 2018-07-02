<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bm3Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bm3-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_bien') ?>

    <?= $form->field($model, 'id_bm3') ?>

    <?= $form->field($model, 'date_caducidad') ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?php // echo $form->field($model, 'date_in') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
