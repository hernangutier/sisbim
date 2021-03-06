<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs(
  '$("document").ready(function(){ $("input:visible:enabled").first().focus(); });'
); ?>


<div class="proveedores-form">


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
                          Datos de Credito

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
                            echo Yii::$app->controller->renderPartial('_creditos',['model'=>$model,'form'=>$form]);
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
