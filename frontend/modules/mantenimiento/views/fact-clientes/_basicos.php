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
/* @var $model commmon\models\FactClientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-basicos">


  <?= $form->field($model, 'cedrif', [
    'addon' => ['prepend' => ['content'=>'<i class="fa fa-key"></i>']]
      ])->widget('yii\widgets\MaskedInput', [
      'mask' => 'a-99999999-9'
  ])?>

    <?= $form->field($model, 'razon')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model,'direccion',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-map-marker"></i>']]
    ])->textArea(['rows' => 3]) ?>
    <div class="row">

    <div class="col-sm-4">
      <?= $form->field($model, 'telefono', [
        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
          ])->widget('yii\widgets\MaskedInput', [
          'mask' => '9999-999-9999'
      ])?>
    </div>
    <div class="col-sm-4">
      <?= $form->field($model, 'fax', [
        'addon' => ['prepend' => ['content'=>'<i class="fa fa-fax"></i>']]
          ])->widget('yii\widgets\MaskedInput', [
          'mask' => '9999-999-9999'
      ])?>
    </div>
    <div class="col-sm-4">
      <?= $form->field($model, 'email', [
                  'addon' => ['prepend' => ['content'=>'@']]
                    ])->widget('yii\widgets\MaskedInput', [
                      'clientOptions' => [
                            'alias' =>  'email'
                    ],
                    ])?>
    </div>


    </div>















</div>
