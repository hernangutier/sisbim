<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model commmon\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-basicos">


    <?= $form->field($model, 'cedrif')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => 'a-99999999-9',
    ]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'direccion')->textArea(['rows' => 6]) ?>

    <?= $form->field($model,'fnac')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese la Fecha de Nacimiento ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
        ]
        ])

    ?>

    
















</div>
