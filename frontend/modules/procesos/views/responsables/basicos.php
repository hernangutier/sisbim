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

    



</div>
