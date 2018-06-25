<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\widgets\SwitchInput;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use common\models\GvPolizas;


/* @var $this yii\web\View */
/* @var $model common\models\GvPolizas */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model, 'id_aseguradora')->dropDownList(
                    ArrayHelper::map(common\models\SdbSeguros::find()->asArray()->all(),'id','razon')
                  )
    ?>


  </div>
  <div class="col-sm-6">
    <?= $form->field($model, 'otra_aseguradora')->textInput(['maxlength' => true]) ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model, 'npoliza', [

      'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-barcode"></i>']]
        ])?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'tipo')->textInput() ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'tipo_cobertura')->dropDownList(
                    GvPolizas::lsTipoCobertura()
                  )
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model, 'moneda')->dropDownList(
                    GvPolizas::lsMonedas()
                  )
    ?>

  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'especifique_moneda')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-sm-4">
    <?=
    $form->field($model, 'monto')->widget(MaskMoney::classname(), [
      'pluginOptions' => [
        'prefix' => '$ ',
        'suffix' => ' ¢',
        'allowNegative' => false
    ]
    ]);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model,'f_ini')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Inicio de la Cobertura'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
    ]
    ])
    ?>
  </div>
  <div class="col-sm-6">
    <?= $form->field($model,'f_fin')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Vencimiento de la Cobertura'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
    ]
    ])
    ?>
  </div>
</div>
