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
    <div class='profile-info-name'> Apellidos </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='username'><?php echo $model->apellidos ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Nombres </div>

    <div class='profile-info-value'>
      
      <span class='editable editable-click' id='username'><?php echo $model->nombres ?></span>

    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Edad Actual </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='age'><?= $model->getEdadAnos()  ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Direccion </div>

    <div class='profile-info-value'>
      <i class='fa fa-map-marker light-orange bigger-110'></i>
      <span class='editable editable-click' id='username'><?php echo $model->direccion ?></span>

    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Fecha de Nacimiento </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='login'> <?= date_format(date_create($model->fnac), 'd/m/Y')  ?></span>
    </div>
  </div>


</div>

<div class='space-20'></div>
