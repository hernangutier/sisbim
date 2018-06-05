<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\FactVendedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fact-vendedores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedrif', [
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-key"></i>']]
        ])->widget('yii\widgets\MaskedInput', [
        'mask' => 'a-99999999-9'
    ])?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'direccion',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-map-marker"></i>']]
    ])->textArea(['rows' => 3]) ?>

    <?= $form->field($model, 'telefono', [
      'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
        ])->widget('yii\widgets\MaskedInput', [
        'mask' => '9999-999-9999'
    ])?>

    <?= $form->field($model, 'email', [
                'addon' => ['prepend' => ['content'=>'@']]
                  ])->widget('yii\widgets\MaskedInput', [
                    'clientOptions' => [
                          'alias' =>  'email'
                  ],
                  ])?>

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

     <div class="hr hr-double hr-dotted "></div>
     <div class="form-group">
         <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
     </div>

    <?php ActiveForm::end(); ?>

</div>
