<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Cargos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargos-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'denominacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'funciones')->textArea(['rows' => 10]) ?>

    <?php //-------------- Organismos -------------


        echo $form->field($model, 'id_esc')->dropDownList(
        ArrayHelper::map(common\models\Cargos::getListEscalas(),'id','resultado'),
        [
           'id'=>'id_esc',
           'prompt'=>'Seleccione la Escala Salarial',
        ]);

        ?>
        <?=  $form->field($model, 'file')->widget(FileInput::classname(), [
            //'options' => ['accept' => 'pdf'],
            'pluginOptions'=>['allowedFileExtensions'=>['jpeg','jpg']],
        ])
        ?>
    <div class="hr hr-double hr-dotted "></div>

    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
