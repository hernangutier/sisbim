<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model commmon\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-laborales">
  <?= $form->field($model, 'nexp')->textInput(['maxlength' => true]) ?>


  <div class="widget-box transparent ui-sortable-handle">
                  <div class="widget-header">
                    <h4 class="widget-title lighter">En caso de ser chofer</h4>

                    <div class="widget-toolbar no-border">

                    </div>
                  </div>

                  <div class="widget-body">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">
                      <?=
                        $form->field($model, 'is_licencia')->widget(SwitchInput::classname(), [
                                  'pluginOptions' => [
                                  'size' => 'large',
                                  'onColor' => 'primary',
                                  'offColor' => 'danger',
                                  'onText' => 'Si',
                                  'offText' => 'No',
                              ]

                          ]);
                      ?>

                      <?= $form->field($model,'f_vence_lic')->widget(DatePicker::classname(), [
                      'options' => ['placeholder' => 'Ingrese la Fecha de Vencimiento Licencia ...'],
                      'pluginOptions' => [
                          'autoclose'=>true,
                          'format'=>'yyyy-mm-dd',
                          ]
                          ])

                      ?>

                    </div>
                  </div>
                </div>

  <?= $form->field($model,'fin')->widget(DatePicker::classname(), [
  'options' => ['placeholder' => 'Ingrese la Fecha de Ingreso ...'],
  'pluginOptions' => [
      'autoclose'=>true,
      'format'=>'yyyy-mm-dd',
      ]
      ])

  ?>

  <?php echo $form->field($model, 'id_und')->dropDownList(
      ArrayHelper::map(common\models\UnidadesAdmin::find()->asArray()->all(), 'id', 'denominacion'),

  [
      'id'=>'select-catfutura',
      'prompt'=>'Seleccione la Unidad Administrativa',

  ]
  ); ?>

  <?php //-------------- Cargo -------------

      echo $form->field($model, 'id_carg')->widget(Select2::classname(), [

           'data' => ArrayHelper::map(common\models\Cargos::find()->asArray()->all(),'id','denominacion'),
           'language' => 'es',

           'options' => ['placeholder' => 'Seleccione el Cargo'],
           'pluginOptions' => [
           'allowClear' => true
           ],

           ]);

   ?>


    <?= $form->field($model, 'condicion_laboral')->dropDownList(
                     [
                      '0'=>'Empleado Fijo',
                      '1'=>'Contratado',
                      '2'=>'Temporal',

                    ]
                   )


     ?>

     <?= $form->field($model, 'jornada_lab')->dropDownList(
                      [
                       '0'=>'Completa',
                       '1'=>'Medio Tiempo',
                       

                     ]
                    )


      ?>


     <?=
       $form->field($model, 'incluir_nom_alimen')->widget(SwitchInput::classname(), [
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
