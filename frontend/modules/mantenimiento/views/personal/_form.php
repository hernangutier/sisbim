<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;


/* @var $this yii\web\View */
/* @var $model common\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                      <li class="active">
                        <a data-toggle="tab" href="#home">
                          <i class="green ace-icon fa fa-cog "></i>
                          Datos Basicos
                        </a>
                      </li>

                      <li>
                        <a data-toggle="tab" href="#messages">
                          <i class="blue ace-icon fa fa-code-fork "></i>
                          Datos Personales

                        </a>
                      </li>

                      <li>
                        <a data-toggle="tab" href="#laborales">
                          <i class="blue ace-icon  fa fa-tags  "></i>
                          Datos Laborales

                        </a>
                      </li>


                      <li>
                        <a data-toggle="tab" href="#adicionales">
                          <i class="blue ace-icon  fa fa-tags  "></i>
                          Datos Adicionales

                        </a>
                      </li>


                    </ul>

                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <?php
                            echo Yii::$app->controller->renderPartial('_basicos',['model'=>$model,'form'=>$form]);
                         ?>

                      </div>

                      <div id="messages" class="tab-pane fade">
                        <?php
                            echo Yii::$app->controller->renderPartial('_personales',['model'=>$model,'form'=>$form]);
                         ?>

                      </div>

                      <div id="laborales" class="tab-pane fade">
                        <?php
                            echo Yii::$app->controller->renderPartial('_form_laborales',['model'=>$model,'form'=>$form]);
                         ?>

                      </div>

                      <div id="adicionales" class="tab-pane fade">
                        <?php
                            echo Yii::$app->controller->renderPartial('_adicionales',['model'=>$model,'form'=>$form]);
                         ?>

                      </div>




                    </div>
                  </div>

      <div class="hr hr-double hr-dotted "></div>
    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
