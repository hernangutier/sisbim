<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Archivo */

?>


<table style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr><td style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding: 19px; border: 1px solid #e3e3e3; background-color: #f5f5f5;" width="100%" valign="top" bgcolor="#f5f5f5" align="left">
<table class="header-row" style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
  <tr><td class="header-row-td" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 0px;" width="100%" valign="top" align="left">Información de Expediente</td></tr></tbody></table>


<table class="table-space" style="height: 10px; font-size: 0px; line-height: 0; width: 100px; background-color: transparent;" width="100" cellspacing="0" cellpadding="0" height="10" border="0" bgcolor="transparent"><tbody><tr><td class="table-space-td" style="height: 10px; width: 100px; background-color: transparent;" width="100" valign="middle" height="10" bgcolor="transparent" align="left">&nbsp;</td></tr></tbody></table>


<div class="row">
  <div class="col-sm-6">
    <?= '<label>N° de Expediente</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->nexp  ?></a>
  </div>
  <div class="col-sm-6">
    <?= '<label>Tipo de Inmueble</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->tipo_inmueble  ?></a>
  </div>
</div>



<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<div class="row">

  <div class="col-sm-6">
    <?= '<label>Identificación</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->identificacion  ?></a>
  </div>

  <div class="col-sm--6">
    <?= '<label>Municipio</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->mun->descripcion  ?></a>
  </div>

</div>

<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<div class="row">
  <div class="col-sm-6">


    <?= '<label>Ubicación</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->ubicacion  ?></a>

</div>




</div>




<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">











</td></tr></tbody></table>
