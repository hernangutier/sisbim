<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model commmon\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-personales">
  <div class="row">


    <div class="col-xs-6">

            <?= $form->field($model, 'lugar_nac')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tel_cel')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9999-9999999',
            ]) ?>

            <?= $form->field($model, 'tel_hab')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9999-9999999',
            ]) ?>

            <?= $form->field($model, 'tel_otro')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9999-9999999',
            ]) ?>



      </div>

      <div class="col-xs-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?php //-------------- Contactos -------------

                echo $form->field($model, 'id_prof')->widget(Select2::classname(), [

                     'data' => ArrayHelper::map(common\models\PersonalProfesiones::find()->asArray()->all(),'id','denominacion'),
                     'language' => 'es',

                     'options' => ['placeholder' => 'Seleccione la Profesión'],
                     'pluginOptions' => [
                     'allowClear' => true
                     ],

                     ]);

             ?>




      </div>

    </div>
  <div class="row">


    <div class="col-xs-3">


    <?=
      $form->field($model, 'sexo')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'primary',
                'offColor' => 'danger',
                'onText' => 'Masculino',
                'offText' => 'Femenino',
            ]

        ]);
    ?>

    <?=
      $form->field($model, 'nacionalidad')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'primary',
                'offColor' => 'danger',
                'onText' => 'Venezolano',
                'offText' => 'Extranjero',
            ]

        ]);
    ?>

    <?=
      $form->field($model, 'usa_lentes')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'primary',
                'offColor' => 'danger',
                'onText' => 'Si',
                'offText' => 'No',
            ]

        ]);
    ?>

    </div>

    <div class="col-xs-3">
      <?= $form->field($model, 'edo_civil')->dropDownList(
                       [
                        '0'=>'Soltero (a)',
                        '1'=>'Casado (a)',
                        '2'=>'Viudo (a)',
                        '3'=>'Divorciado (a)',
                      ]
                     )


       ?>
      <?=
        $form->field($model, 'lateralidad')->widget(SwitchInput::classname(), [
                  'pluginOptions' => [
                  'size' => 'large',
                  'onColor' => 'primary',
                  'offColor' => 'danger',
                  'onText' => 'Diestro',
                  'offText' => 'Zurdo',
              ]

          ]);
      ?>

      <?= $form->field($model, 'grupo_sanguineo')->dropDownList(
                       [
                        '0'=>'Orh+',
                        '1'=>'Orh-',
                        '2'=>'B+',
                        '3'=>'B-',




                       ]
                     )


       ?>

    </div>

    <div class="col-xs-3">
      <div class="widget-box transparent ui-sortable-handle">
											<div class="widget-header">
												<h4 class="widget-title lighter">Medidas</h4>

												<div class="widget-toolbar no-border">

												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-6 no-padding-left no-padding-right">
                          <?= $form->field($model, 'estatura')->textInput(['maxlength' => true]) ?>
                          <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

												</div>
											</div>
										</div>


    </div>
    <div class="col-xs-3">
      <div class="widget-box transparent ui-sortable-handle">
                      <div class="widget-header">
                        <h4 class="widget-title lighter">Tallas</h4>

                        <div class="widget-toolbar no-border">

                        </div>
                      </div>

                      <div class="widget-body">
                        <div class="widget-main padding-6 no-padding-left no-padding-right">
                          <?= $form->field($model, 'talla_cal')->textInput(['maxlength' => true]) ?>
                          <?= $form->field($model, 'talla_camiza')->dropDownList(
                                           [
                                            '0'=>'S',
                                            '1'=>'M',
                                            '2'=>'L',
                                            '3'=>'XL',
                                            '4'=>'XXL',



                                           ]
                                         )


                           ?>
                          <?= $form->field($model, 'talla_pantalon')->textInput(['maxlength' => true]) ?>

                        </div>
                      </div>
                    </div>
    </div>


  </div>









</div>
