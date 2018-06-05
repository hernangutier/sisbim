<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $model common\models\FactCxp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fact-cxp-form">

    <?php $form = ActiveForm::begin(); ?>



    <?php //-------------- Cargo -------------

        echo $form->field($model, 'id_prov')->widget(Select2::classname(), [

             'data' => ArrayHelper::map(common\models\FactProveedores::find()->asArray()->all(),'id','razon'),
             'language' => 'es',

             'options' => ['placeholder' => 'Seleccione el Proveedor'],
             'pluginOptions' => [
             'allowClear' => true
             ],

             ]);

     ?>

     <?= $form->field($model, 'num_factura')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model,'date_factura')->widget(DatePicker::classname(), [
     'options' => ['placeholder' => 'Ingrese la Fecha de la Factura ...'],
     'pluginOptions' => [
         'autoclose'=>true,
         'format'=>'yyyy-mm-dd',
         ]
         ])

     ?>

     <?=
       $form->field($model, 'tipo')->widget(SwitchInput::classname(), [
                 'pluginOptions' => [
                 'size' => 'large',
                 'onColor' => 'success',
                 'offColor' => 'danger',
                 'onText' => 'Contado',
                 'offText' => 'Credito',
             ]

         ]);
     ?>

     <?php //-------------- Cargo -------------

         echo $form->field($model, 'id_dep')->widget(Select2::classname(), [

              'data' => ArrayHelper::map(common\models\FactDepositos::find()->asArray()->all(),'id','denominacion'),
              'language' => 'es',

              'options' => ['placeholder' => 'Seleccione el Deposito o Almacen de Entrada'],
              'pluginOptions' => [
              'allowClear' => true
              ],

              ]);

      ?>



    <div class="hr hr-double hr-dotted "></div>
  <div class="form-group">
      <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar y Continuar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
  </div>


    <?php ActiveForm::end(); ?>

</div>
