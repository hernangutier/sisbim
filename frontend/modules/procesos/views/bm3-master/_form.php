<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Periodos;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Bm3Master */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ($model->isNewRecord) ? '<div class="widget-box widget-color-green"' : '<div class="widget-box widget-color-blue2"' ?>>
											<div class="widget-header">
												<h4 class="widget-title">Aperturar Registro de 60 Faltantes del Periodo: <?= Periodos::getActivo()->descripcion ?></h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">


    <?php $form = ActiveForm::begin(); ?>
<fieldset>
  <?= $form->field($model,'date_ini')->widget(DatePicker::classname(), [
  'options' => ['placeholder' => 'Ingrese Fecha de  Apertura...'],
  'pluginOptions' => [
      'autoclose'=>true,
                  'format'=>'yyyy-mm-dd',
  ]
  ])
  ?>
  <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>



</fieldset>


</div>
<div class="widget-toolbox padding-8 clearfix center">


    <?= Html::submitButton('<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> Guardar y Continuar ' , ['class' =>  'btn btn-sm btn-success' ]  ) ?>



</div>
  <?php ActiveForm::end(); ?>
</div>
</div>
