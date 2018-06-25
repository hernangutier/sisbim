<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\widgets\SwitchInput;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use common\models\Proveedores;


/* @var $this yii\web\View */
/* @var $model common\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>


  <?php $form = ActiveForm::begin([
      'id' => 'proveedores-form',
      'enableAjaxValidation' => true,
      'enableClientScript' => true,
      'enableClientValidation' => true,
  ]); ?>




  <div class="row">



    <div class="tabbable">
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                      <a data-toggle="tab" href="#generales">
                        <i class="green ace-icon fa fa-newspaper-o bigger-110"></i>
                        Principales
                      </a>
                    </li>

                    <li >
                      <a data-toggle="tab" href="#ubicacion">
                        <i class="green fa fa-address-book bigger-110"></i>
                         de Ubicacion
                      </a>
                    </li>

                    <li >
                      <a data-toggle="tab" href="#adicionales">
                        <i class="green fa fa-address-book bigger-110"></i>
                        Adicionales
                      </a>
                    </li>






                  </ul>

                  <div class="tab-content">
                    <div id="generales" class="tab-pane fade in active">

                      <?php
                          echo Yii::$app->controller->renderPartial('_basicos',['model'=>$model,'form'=>$form]);
                       ?>

                    </div>

                    <div id="ubicacion" class="tab-pane fade">
                      <?php
                          echo Yii::$app->controller->renderPartial('_ubicacion',['model'=>$model,'form'=>$form]);
                       ?>

                    </div>

                    <div id="adicionales" class="tab-pane fade">
                      <?php
                          echo Yii::$app->controller->renderPartial('_adicionales',['model'=>$model,'form'=>$form]);
                       ?>

                    </div>


                  </div>
        </div>

  </div>



  <div class="modal-footer">



    <button class="btn btn-white btn-danger btn-bold pull-right" data-dismiss="modal">
      <i class="ace-icon fa fa-times red2"></i>
      Cancelar
    </button>
    <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green "></i>Guardar', ['class' => 'btn btn-white btn-success btn-bold pull-right']) ?>


  </div>

    <?php ActiveForm::end(); ?>
