<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-basicos">








  <?= $form->field($model, 'codigo', [
    'addon' => ['prepend' => ['content'=>'<i class="fa fa-barcode"></i>']]
      ])->widget('yii\widgets\MaskedInput', [
      'mask' => '9999'
  ])?>


    <?= $form->field($model, 'cedrif', [
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-key"></i>']]
        ])->widget('yii\widgets\MaskedInput', [
        'mask' => 'A-99999999-9'
    ])?>



    <?= $form->field($model, 'razon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otra_descripcion')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'tipo_de_proveedor')->dropDownList(
                    ['0'=>'Nacional',
                    '1'=>'Internacional',

                    ]
                  )


    ?>






</div>
