<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalProfesiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-profesiones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denominacion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model,'perfil')->textArea(['rows' => 6]) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <div class="hr hr-double hr-dotted "></div>
    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
