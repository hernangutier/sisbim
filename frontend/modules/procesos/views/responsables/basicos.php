<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\Responsables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-form">



  <?= $form->field($model, 'cedrif', [
    'addon' => ['prepend' => ['content'=>'<i class="fa fa-key"></i>']]
      ])->widget('yii\widgets\MaskedInput', [
      'mask' => 'A-99999999'
  ])?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textarea(['maxlength' => true]) ?>





    <?= $form->field($model, 'telefono')->widget(\yii\widgets\MaskedInput::className(), [
    		'mask' => '(9999)-999-9999',

	]) ?>

  <?= $form->field($model, 'fax')->widget(\yii\widgets\MaskedInput::className(), [
      'mask' => '(9999)-999-9999',

]) ?>

    <?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
    		'name' => 'input-36',
    			'clientOptions' => [
        		'alias' =>  'email'
    			],
	]) ?>



</div>
