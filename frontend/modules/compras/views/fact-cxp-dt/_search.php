<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FactCxpDtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fact-cxp-dt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_compra') ?>

    <?= $form->field($model, 'id_prod') ?>

    <?= $form->field($model, 'costo') ?>

    <?= $form->field($model, 'cant') ?>

    <?php // echo $form->field($model, 'is_mayor')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
