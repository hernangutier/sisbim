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
/* @var $model commmon\models\FactProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-facturacion">






<div class="row">
  <div class="col-sm-3">
    <?=
      $form->field($model, 'garantia')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'Si',
                'offText' => 'No',
            ]

        ]);
    ?>
  </div>

  <div class="col-sm-3">
    <?= $form->field($model, 'dias_garantia', [
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-calendar-plus-o"></i>']]
        ])?>
  </div>

  <div class="col-sm-3">
    <?=  $form->field($model, 'percent_comision')->widget(MaskMoney::classname(), [
                      'pluginOptions' => [
                      'allowNegative' => false
                      ]
                  ]);
                  ?>
  </div>

  <div class="col-sm-3">
    <?= $form->field($model, 'min_und_facturar')->textInput(['maxlength' => true]) ?>
  </div>

</div>

<h3 class="header smaller lighter red2">
                    <i class="ace-icon fa fa-wrench"></i>
                    Parametros para Calculos de Optimización de Inventario
</h3>

<div class="row">

    <div class="col-sm-6">
      <?= $form->field($model, 'e_min')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'e_max')->textInput(['maxlength' => true]) ?>
    </div>

</div>




</div>
