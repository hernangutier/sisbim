<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Movimientos */

?>


<?php
$url="";
$this->registerJs("
$(document).ready(function (){

  $(document).on('click','.procesar',function (){
    krajeeDialog.confirm('Esta seguro de Procesar  ', function (result) {
         if (result) {
            $.ajax({

            url: (this).data('url'),
            type: 'POST',

            error : function(xhr, status) {
              //$('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
            },
            success: function (json){


            },

          });
        }
      });

    });


   });
  ");
?>


<table style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr><td style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding: 19px; border: 1px solid #e3e3e3; background-color: #f5f5f5;" width="100%" valign="top" bgcolor="#f5f5f5" align="left">
<table class="header-row" style="table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
  <tr><td class="header-row-td" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 0px;" width="100%" valign="top" align="left">Informacion de la Inspeccion</td></tr></tbody></table>
<span style="font-family: Arial, sans-serif; line-height: 19px; color: #777777; font-size: 14px;">Inspección </span>

<table class="table-space" style="height: 10px; font-size: 0px; line-height: 0; width: 100px; background-color: transparent;" width="100" cellspacing="0" cellpadding="0" height="10" border="0" bgcolor="transparent"><tbody><tr><td class="table-space-td" style="height: 10px; width: 100px; background-color: transparent;" width="100" valign="middle" height="10" bgcolor="transparent" align="left">&nbsp;</td></tr></tbody></table>
<?= '<label>N° de Control</label><br>' ?>
<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->ncontrol  ?></a>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?php
echo '<label>Motivo</label><br>';
echo Editable::widget([
    'name'=>'motivo',
    'asPopover' => false,

    'inputType' => Editable::INPUT_TEXTAREA,
    'value' => $model->descripcion,
    'header' => 'Motivo',
    'submitOnEnter' => false,
    'size'=>'lg',
    'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Enter notes...']
    ]);
?>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Fecha de Inicio</label><br>' ?>
<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->f_ini  ?></a>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Fecha de Cierre</label><br>' ?>
<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;"><?= $model->f_fin  ?></a>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Estatus</label><br>' ?>
<?= $model->getStatusHtml() ?>
<hr data-skipstyle="true" style="border-width: 0px; height: 1px; background-color: #e8e8e8;">
<?= '<label>Resgistrado por</label><br>' ?>
<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">bienes@gmail.com</a>

<?php
    if ($model->status==0){
      echo '<div class="clearfix form-actions">
      										<div class="col-md-offset-3 col-md-9">
      											<button class="btn btn-info procesar" type="button" data-url='. Url::to(['procesar','id'=>$model->id]) .'>' .
      												'<i class="ace-icon fa fa-check bigger-110 "></i>
      												Procesar
      											</button>

      											&nbsp; &nbsp; &nbsp;

      										</div>
      									</div>';
    }

 ?>


</td></tr></tbody></table>
