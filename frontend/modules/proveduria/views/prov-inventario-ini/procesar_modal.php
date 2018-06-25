<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIni */
/* @var $new_model common\models\ProvInventarioIni */
/* @var $form yii\widgets\ActiveForm */
?>






<table style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr><td style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding: 19px; border: 1px solid #e3e3e3; background-color: #f5f5f5;" width="100%" valign="top" bgcolor="#f5f5f5" align="left">
<table class="header-row" style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
  <tr><td class="header-row-td" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 0px;" width="100%" valign="top" align="left">Resumen del Inventario</td></tr></tbody></table>

<div class="row">
  <div class="col-sm-6">
    <table class="table-space" style="height: 10px; font-size: 0px; line-height: 0; width: 100px; background-color: transparent;" width="100" cellspacing="0" cellpadding="0" height="10" border="0" bgcolor="transparent"><tbody><tr><td class="table-space-td" style="height: 10px; width: 100px; background-color: transparent;" width="100" valign="middle" height="10" bgcolor="transparent" align="left">&nbsp;</td></tr></tbody></table>
    <?php
    echo '<label>Referencia</label><br>';
    echo $model->ref;

    ?>
  </div>
  <div class="col-sm-6">
    <table class="table-space" style="height: 10px; font-size: 0px; line-height: 0; width: 100px; background-color: transparent;" width="100" cellspacing="0" cellpadding="0" height="10" border="0" bgcolor="transparent"><tbody><tr><td class="table-space-td" style="height: 10px; width: 100px; background-color: transparent;" width="100" valign="middle" height="10" bgcolor="transparent" align="left">&nbsp;</td></tr></tbody></table>
    <?php
    echo '<label>Motivo</label><br>';
    echo $model->motivo;

    ?>
  </div>

</div>

<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">

<div class="row">
  <div class="col-sm-6">
    <?= '<label>Responsable</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->user->email_bm  ?></a>
  </div>
  <div class="col-sm-6">
    <?= '<label>Total Items de Inventario</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">
      <?= $model->getProvInventarioIniDts()->count()  ?></a>
  </div>

</div>

<?php $form = ActiveForm::begin([
    'id' => 'inv-procesar-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">

<div class="row">
  <div class="col-sm-6">
    <?= $form->field($new_model, 'ref', [

      'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-barcode"></i>']]
        ])?>
  </div>
  <div class="col-sm-6">
    <?= $form->field($new_model,'fecha_cierre')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese la Fecha de Cierre ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format'=>'yyyy-mm-dd',
        ]
        ])

    ?>
  </div>
</div>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model, 'tipo')->dropDownList(
                    [
                      0=>'Inventario Inicial',
                      1=>'Inventario Ordinario'
                    ]
                  )
    ?>
  </div>
  <div class="col-sm-8">
    <?= $form->field($new_model,'motivo')->textArea(['rows' => 2]) ?>
  </div>
</div>

<div class="clearfix form-actions">
										<div class="col-md-offset-4 col-md-9">
											<button class="btn btn-info procesar" type="submit">
												<i class="ace-icon fa fa-check bigger-110 "></i>
												Confirmar
											</button>

											&nbsp; &nbsp; &nbsp;

										</div>
									</div>
</td></tr></tbody></table>

<?php ActiveForm::end(); ?>


<?php
  $this->registerJs("
  ");
 ?>
