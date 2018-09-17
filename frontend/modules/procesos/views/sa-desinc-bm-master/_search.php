<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaDesincBmMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sa-desinc-bm-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ncontrol') ?>

    <?= $form->field($model, 'id_conc') ?>

    <?= $form->field($model, 'date_creation') ?>

    <?= $form->field($model, 'date_close') ?>

    <?php // echo $form->field($model, 'id_periodo') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'nacta') ?>

    <?php // echo $form->field($model, 'fecha_acta') ?>

    <?php // echo $form->field($model, 'id_ben') ?>

    <?php // echo $form->field($model, 'motivo_nulls') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
