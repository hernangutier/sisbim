<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UnidadesAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidades-admin-form">


  <?= $form->field($model, 'codigo', [
    'addon' => ['prepend' => ['content'=>'<i class="fa fa-baride"></i>']]
      ])->widget('yii\widgets\MaskedInput', [
      'mask' => '999'
  ])?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

     <?php //-------------- Contactos -------------

       echo $form->field($model, 'categoria')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(common\models\SdbCatUnidadesAdmin::find()->OrderBy('descripcion')->all(),'id',
                 function($model, $defaultValue) {
                    return $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Categoria de la Unidad ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>

    <div class="row">
      <div class="col-sm-6">
        <?= $form->field($model, 'telefono')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '(9999)-999-9999',

        ]) ?>
      </div>
      <div class="col-sm-6">
        <?= $form->field($model, 'tel_ext')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
                 'name' => 'input-36',
                     'clientOptions' => [
                     'alias' =>  'email'
                     ],
         ]) ?>
      </div>
      <div class="col-sm-6">
          <?= $form->field($model, 'nomenclatura')->textInput(['maxlength' => true]) ?>
      </div>
    </div>













</div>
