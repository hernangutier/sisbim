<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\ArchivoUbicaciones */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
    <?= $form->field($model, 'codigo', [
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-barcode"></i>']]
        ])->widget('yii\widgets\MaskedInput', [
        'mask' => '69999'
    ])?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
  </fieldset>
    <div class="widget-toolbox padding-8 clearfix">
			<div class="form-group">
					<?= Html::submitButton( ($model->isNewRecord) ? '<i class="ace-icon fa fa-floppy-o bigger-120 green "></i> Guardar' : '<i class="ace-icon fa fa-floppy-o bigger-120  "></i> Guardar' , ['class' => ($model->isNewRecord) ? 'btn btn-white btn-success btn-bold pull-right' : 'btn btn-white btn-primary btn-bold pull-right']  ) ?>
			</div>
		</div>

    <?php ActiveForm::end(); ?>
