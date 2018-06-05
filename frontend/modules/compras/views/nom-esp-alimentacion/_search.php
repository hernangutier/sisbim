<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nom-esp-alimentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'id_user_create') ?>

    <?= $form->field($model, 'id_user_revisa') ?>

    <?= $form->field($model, 'id_user_procesa') ?>

    <?php // echo $form->field($model, 'f_create') ?>

    <?php // echo $form->field($model, 'f_revisa') ?>

    <?php // echo $form->field($model, 'f_aprueba') ?>

    <?php // echo $form->field($model, 'is_proxima')->checkbox() ?>

    <?php // echo $form->field($model, 'id_periodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
