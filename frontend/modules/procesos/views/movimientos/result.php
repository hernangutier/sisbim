<?php
/* @var $model frontend\models\Finish */

 ?>

 <?php
      $this->registerJs("
       $(document).ready(function() {
         window.history.pushState(null, '', window.location.href);
         window.onpopstate = function() {
            window.history.pushState(null, '', window.location.href);
          };
        })

        $(document).on('click', '.refresh', (function() {
           $.pjax.reload({container: '#grid-movimientos-dt'});

        }))

      ");
  ?>



<div class="col-md-6 col-md-offset-3">
<tr><td class="table-td-wrap" align="center" width="458"><table class="table-space" style="height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" border="0" bgcolor="#E4E6E9" width="450" cellspacing="0" cellpadding="0" height="18"><tbody><tr><td class="table-space-td" style="height: 18px; width: 450px; background-color: #e4e6e9;" align="left" bgcolor="#E4E6E9" width="450" valign="middle" height="18">&nbsp;</td></tr></tbody></table>
<table class="table-space" style="height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0" height="8"><tbody><tr><td class="table-space-td" style="height: 8px; width: 450px; background-color: #ffffff;" align="left" bgcolor="#FFFFFF" width="450" valign="middle" height="8">&nbsp;</td></tr></tbody></table>

<table class="table-row" style="table-layout: fixed; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" align="left" valign="top">
  <table class="table-col" style="table-layout: fixed;" align="left" border="0" width="378" cellspacing="0" cellpadding="0"><tbody><tr><td class="table-col-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" align="left" width="378" valign="top">
    <table class="header-row" style="table-layout: fixed;" border="0" width="378" cellspacing="0" cellpadding="0"><tbody><tr><td class="header-row-td" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;" align="left" width="378" valign="top"><?= $model->title ?></td></tr></tbody></table>
    <div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;">
      <b style="color: #777777;"><?= $model->content  ?></b>
      <br>
      Por Favor presione Nuevo para Generar un Nuevo Movimiento...
    </div>
  </td></tr></tbody></table>
</td></tr></tbody></table>

<table class="table-space" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0" height="12"><tbody><tr><td class="table-space-td" style="height: 12px; width: 450px; background-color: #ffffff;" align="left" bgcolor="#FFFFFF" width="450" valign="middle" height="12">&nbsp;</td></tr></tbody></table>
<table class="table-space" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0" height="12"><tbody><tr><td class="table-space-td" style="height: 12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" align="center" bgcolor="#FFFFFF" width="450" valign="middle" height="12">&nbsp;<table border="0" bgcolor="#E8E8E8" width="100%" cellspacing="0" cellpadding="0" height="0"><tbody><tr><td style="height: 1px; font-size:0;" align="left" bgcolor="#E8E8E8" width="100%" valign="top" height="1">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
<table class="table-space" style="height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0" height="16"><tbody><tr><td class="table-space-td" style="height: 16px; width: 450px; background-color: #ffffff;" align="left" bgcolor="#FFFFFF" width="450" valign="middle" height="16">&nbsp;</td></tr></tbody></table>

<table class="table-row" style="table-layout: fixed; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" align="left" valign="top">
  <table class="table-col" style="table-layout: fixed;" align="left" border="0" width="378" cellspacing="0" cellpadding="0"><tbody><tr><td class="table-col-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" align="left" width="378" valign="top">
    <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
      <a href="<?= $model->urlButton ?>" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 15px; line-height: 21px; background-color: #6fb3e0;">&nbsp; Nuevo &nbsp;</a>
    </div>
    <table class="table-space" style="height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="378" cellspacing="0" cellpadding="0" height="16"><tbody><tr><td class="table-space-td" style="height: 16px; width: 378px; background-color: #ffffff;" align="left" bgcolor="#FFFFFF" width="378" valign="middle" height="16">&nbsp;</td></tr></tbody></table>
  </td></tr></tbody></table>
</td></tr></tbody></table>

<table class="table-space" style="height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0" height="6"><tbody><tr><td class="table-space-td" style="height: 6px; width: 450px; background-color: #ffffff;" align="left" bgcolor="#FFFFFF" width="450" valign="middle" height="6">&nbsp;</td></tr></tbody></table>

<table class="table-row-fixed" style="table-layout: fixed; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0"><tbody><tr><td class="table-row-fixed-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 1px; padding-right: 1px;" align="left" valign="top">
  <table class="table-col" style="table-layout: fixed;" align="left" border="0" width="448" cellspacing="0" cellpadding="0"><tbody><tr><td class="table-col-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" align="left" width="448" valign="top">
    <table style="table-layout: fixed;" border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td style="font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center; padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;" align="center" bgcolor="#f5f5f5" width="100%" valign="top">

    </td></tr></tbody></table>
  </td></tr></tbody></table>
</td></tr></tbody></table>
<table class="table-space" style="height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" border="0" bgcolor="#FFFFFF" width="450" cellspacing="0" cellpadding="0" height="1"><tbody><tr><td class="table-space-td" style="height: 1px; width: 450px; background-color: #ffffff;" align="left" bgcolor="#FFFFFF" width="450" valign="middle" height="1">&nbsp;</td></tr></tbody></table>
<table class="table-space" style="height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" border="0" bgcolor="#E4E6E9" width="450" cellspacing="0" cellpadding="0" height="36"><tbody><tr><td class="table-space-td" style="height: 36px; width: 450px; background-color: #e4e6e9;" align="left" bgcolor="#E4E6E9" width="450" valign="middle" height="36">&nbsp;</td></tr></tbody></table></td></tr>


</div>
