<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\widgets\TouchSpin;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model commmon\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-creditos">

  <?=
    $form->field($model, 'credito_activo')->widget(SwitchInput::classname(), [
              'pluginOptions' => [
              'size' => 'large',
              'onColor' => 'success',
              'offColor' => 'danger',
              'onText' => 'Si',
              'offText' => 'No',
          ]

      ]);
  ?>
<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model, 'dias_credito', [
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-calendar-plus-o"></i>']]
        ])?>
  </div>

  <div class="col-sm-6">
    <?=  $form->field($model, 'limite_credito',[
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-window-minimize"></i>']]
        ])->widget(MaskMoney::classname(), [
                      'pluginOptions' => [
                      'allowNegative' => false
                      ]
                  ]);
                  ?>
  </div>

</div>

<div class="row">
  <div class="col-sm-6">

  </div>

  <div class="col-sm-6">
    <?=  $form->field($model, 'retencion',[
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-percent"></i>']]
        ])->widget(MaskMoney::classname(), [
                      'pluginOptions' => [
                      'allowNegative' => false
                      ]
                  ]);
                  ?>
  </div>

</div>

 <div class="row">
   <div class="col-sm-6">

   </div>

   <div class="col-sm-6">

   </div>

 </div>



</div>
