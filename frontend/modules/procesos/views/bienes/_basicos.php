<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;


/* @var $this yii\web\View */
/* @var $model common\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-form">





    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>


    <div class="row">
      <div class="col-md-6">
        <?php //-------------- Lineas -------------

           echo $form->field($model, 'id_lin')->widget(Select2::classname(), [

                'data' => ArrayHelper::map(common\models\Lineas::find()->all(),'id',
                     function($model, $defaultValue) {
                        return $model->descripcion;
                }
        ),
                'language' => 'es',

                'options' => ['placeholder' => 'Seleccione la Linea ...'],
                'pluginOptions' => [
                'allowClear' => true
                ],

                ]);

        ?>
      </div>
      <div class="col-md-6">
        <?php //-------------- Lineas -------------

           echo $form->field($model, 'id_clas')->widget(Select2::classname(), [

                'data' => ArrayHelper::map(common\models\Clasificacion::find()->all(),'id',
                     function($model, $defaultValue) {
                        return  $model->grupo . '-'. $model->subgrupo . '-'.$model->seccion . '  ' . $model->descripcion;
                }
        ),
                'language' => 'es',

                'options' => ['placeholder' => 'Seleccione la Clasificacion ...'],
                'pluginOptions' => [
                'allowClear' => true
                ],

                ]);

        ?>
      </div>
    </div>



    <div class="row">
      <div class="col-md-6">
          <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-6">
        <?=
        $form->field($model, 'costo')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            //'prefix' => '$ ',

            //'suffix' => ' BsF.',
            'allowNegative' => false
        ]
        ]);
        ?>
      </div>
    </div>





</div>
