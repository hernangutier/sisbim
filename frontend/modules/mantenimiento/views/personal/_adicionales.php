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




  <?= $form->field($model,'observaciones')->textArea(['rows' => 10]) ?>
  <?= $form->field($model,'condiciones_medicas')->textArea(['rows' => 10]) ?>






</div>
