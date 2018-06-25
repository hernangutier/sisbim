<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIni */

?>


<table style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr><td style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding: 19px; border: 1px solid #e3e3e3; background-color: #f5f5f5;" width="100%" valign="top" bgcolor="#f5f5f5" align="left">
<table class="header-row" style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
  <tr><td class="header-row-td" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 0px;" width="100%" valign="top" align="left">Información del Inventario</td></tr></tbody></table>
<span style="font-family: Arial, sans-serif; line-height: 19px; color: #777777; font-size: 14px;">Toma de Inventario inicial al 2018 </span>

<table class="table-space" style="height: 10px; font-size: 0px; line-height: 0; width: 100px; background-color: transparent;" width="100" cellspacing="0" cellpadding="0" height="10" border="0" bgcolor="transparent"><tbody><tr><td class="table-space-td" style="height: 10px; width: 100px; background-color: transparent;" width="100" valign="middle" height="10" bgcolor="transparent" align="left">&nbsp;</td></tr></tbody></table>
<?php
echo '<label>Motivo</label><br>';
echo Editable::widget([
    'name'=>'motivo',
    'asPopover' => false,

    'inputType' => Editable::INPUT_TEXTAREA,
    'value' => $model->motivo,
    'header' => 'Motivo',
    'submitOnEnter' => false,
    'size'=>'lg',
    'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Enter notes...']
    ]);
?>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Creado el</label><br>' ?>
<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->fecha_creation  ?></a>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Estatus</label><br>' ?>
<?= $model->getStatusHtml() ?>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Responsable</label><br>' ?>
<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">bienes@gmail.com</a>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Ubicación</label><br>' ?>
<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">Almacen</a>

<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info procesar" type="button" data-url=<?= Url::to(['modal','id'=>$model->id]) ?> >
												<i class="ace-icon fa fa-check bigger-110 "></i>
												Procesar
											</button>

											&nbsp; &nbsp; &nbsp;

										</div>
									</div>
</td></tr></tbody></table>
