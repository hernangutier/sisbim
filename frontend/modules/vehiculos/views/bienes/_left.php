<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Bienes */

?>


<table style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr><td style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding: 19px; border: 1px solid #e3e3e3; background-color: #f5f5f5;" width="100%" valign="top" bgcolor="#f5f5f5" align="left">
<table class="header-row" style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
  <tr><td class="header-row-td" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 0px;" width="100%" valign="top" align="left">Información Vehicular</td></tr></tbody></table>


<table class="table-space" style="height: 10px; font-size: 0px; line-height: 0; width: 100px; background-color: transparent;" width="100" cellspacing="0" cellpadding="0" height="10" border="0" bgcolor="transparent"><tbody><tr><td class="table-space-td" style="height: 10px; width: 100px; background-color: transparent;" width="100" valign="middle" height="10" bgcolor="transparent" align="left">&nbsp;</td></tr></tbody></table>


<div class="row">
  <div class="col-sm-6">
    <?= '<label>Placa</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->placa  ?></a>
  </div>
  <div class="col-sm-6">
    <?= '<label>Color</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->color  ?></a>
  </div>
</div>



<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<div class="row">

  <div class="col-sm-6">
    <?= '<label>Año</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->ano  ?></a>
  </div>

  <div class="col-sm--6">
    <?= '<label>Modelo</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->modelo  ?></a>
  </div>

</div>

<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<div class="row">
  <div class="col-sm-6">


    <?= '<label>Serial de Carroceria</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->serialcarroceria  ?></a>

</div>

<div class="col-sm-6">

  <?= '<label>Serial de Motor</label><br>' ?>
  <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->seralmotor  ?></a>

</div>


</div>




<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<div class="row">

  <div class="col-sm-6">
    <?= '<label>Tipo de vehicle</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->getHelperTipo()  ?></a>
  </div>

  <div class="col-sm--6">
    <?= '<label>Tipo de Carroceria</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->getHelperTipoCarroceria()  ?></a>
  </div>

</div>

<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<div class="row">

  <div class="col-sm-6">
    <?= '<label>Tipo de Combustible</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->getHelperCombustible()  ?></a>
  </div>

  <div class="col-sm--6">
    <?= '<label>Tipo Segun SUDEBIP</label><br>' ?>
    <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->vehicle->getHelperTipoSudebip()  ?></a>
  </div>

</div>

<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">








</td></tr></tbody></table>
