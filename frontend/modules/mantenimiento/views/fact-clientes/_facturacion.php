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
/* @var $model commmon\models\FactClientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-facturacion">

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
    <?php //-------------- Cargo -------------

        echo $form->field($model, 'id_zona')->widget(Select2::classname(), [

             'data' => ArrayHelper::map(common\models\FactZonas::find()->asArray()->all(),'id','denominacion'),
             'language' => 'es',

             'options' => ['placeholder' => 'Seleccione la Zona'],
             'pluginOptions' => [
             'allowClear' => true
             ],

             ]);

     ?>
  </div>

  <div class="col-sm-6">
    <?=  $form->field($model, 'limite_credito')->widget(MaskMoney::classname(), [
                      'pluginOptions' => [
                      'allowNegative' => false
                      ]
                  ]);
                  ?>
  </div>

</div>

 <div class="row">
   <div class="col-sm-6">
     <?= $form->field($model,'direccion_cobro',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-map-marker"></i>']]
     ])->textArea(['rows' => 3]) ?>
   </div>

   <div class="col-sm-6">
     <?= $form->field($model,'direccion_envio',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-map-marker"></i>']]
     ])->textArea(['rows' => 3]) ?>
   </div>

 </div>



</div>
