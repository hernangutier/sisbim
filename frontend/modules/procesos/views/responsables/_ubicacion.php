<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model common\models\Responsables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-form">


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
