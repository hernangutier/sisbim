<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RefTipoDocumentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-tipo-documentos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denominacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
