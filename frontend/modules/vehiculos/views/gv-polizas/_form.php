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


  <?php $form = ActiveForm::begin([
      'id' => 'poliza-form',
      'enableAjaxValidation' => true,
      'enableClientScript' => true,
      'enableClientValidation' => true,
  ]); ?>

  <div class="profile-user-info profile-user-info-striped">
                          <div class="profile-info-row">
                            <div class="profile-info-name">Vehiculo </div>

                            <div class="profile-info-value">
                              <span class="editable editable-click" id="username"><?= $model->bien->descripcion ?></span>
                            </div>
                          </div>
  </div>


  <div class="row">

  
<hr>
    <div class="tabbable">
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                      <a data-toggle="tab" href="#basicos">
                        <i class="blue ace-icon fa fa-newspaper-o bigger-110"></i>
                        Datos Generales
                      </a>
                    </li>

                    <li >
                      <a data-toggle="tab" href="#accesorios">
                        <i class="blue fa fa-address-book bigger-110"></i>
                        Datos Adicionales
                      </a>
                    </li>





                  </ul>

                  <div class="tab-content">
                    <div id="basicos" class="tab-pane fade in active">

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
                              //'prefix' => '$ ',
                              'precision' => 2,
                              'decimalSeparator' => '.',
                              //'suffix' => ' BsF.',
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

                    </div>

                    <div id="accesorios" class="tab-pane fade">
                      <?= $form->field($model, 'resp_civil')->textInput(['maxlength' => true]) ?>


                      <?= $form->field($model, 'especifique_tipo_cobertura')->textarea(['maxlength' => true]) ?>

                      <?= $form->field($model, 'descripcion_cobertura')->textarea(['maxlength' => true]) ?>

                      <?= $form->field($model, 'observaciones')->textarea(['maxlength' => true]) ?>

                    </div>








                  </div>
        </div>

  </div>



  <div class="modal-footer">

    <button class="btn btn-white btn-danger btn-bold" data-dismiss="modal">
      <i class="ace-icon fa fa-times red2"></i>
      Cancelar
    </button>

    <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green "></i>Guardar', ['class' => 'btn btn-white btn-success btn-bold pull-right']) ?>
  </div>

    <?php ActiveForm::end(); ?>
