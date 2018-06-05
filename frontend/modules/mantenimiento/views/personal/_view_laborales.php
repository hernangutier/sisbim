
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use common\models\PersonalCargaSearch;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $model commmon\models\Personal */

?>


<div class='space-12'></div>

<div class='profile-user-info profile-user-info-striped'>
  <div class='profile-info-row'>
    <div class='profile-info-name'> Fecha de Ingreso </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= date_format(date_create($model->fin), 'd/m/Y') ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> N° de Expediente </div>

    <div class='profile-info-value'>

      <span class='editable editable-click' id='username'><?php echo $model->nexp ?></span>

    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Posee licencia de conducir </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='age'><?= $model->getHtmlIsLicencia()  ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Fecha de Vencimiento de la Licencia </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='signup'><?= $model->f_vence_lic ? $model->f_vence_lic : 'No Aplica'  ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Unidad Funcional donde labora </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='login'> <?= $model->idUnd->denominacion ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Cargo </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='login'> <?= $model->idCarg->denominacion ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Salario Mensual </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='login'> <h4 class="blue"><?=   number_format($model->idCarg->idEsc->sueldo,2) ?>  Bsf.</h4></span>
    </div>
  </div>


  <div class='profile-info-row'>
    <div class='profile-info-name'> Condicion Laboral </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='login'> <?= $model->getHtmlCondicionLaboral()  ?></span>
    </div>
  </div>


</div>

<div class='space-20'></div>
