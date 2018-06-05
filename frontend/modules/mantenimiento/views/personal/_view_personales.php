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
    <div class='profile-info-name'> Lugar de Nacimiento </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='username'><?php echo $model->lugar_nac ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Tel. Movil </div>

    <div class='profile-info-value'>

      <span class='editable editable-click' id='username'><?php echo $model->tel_cel ?></span>

    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Tel. Residencial </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='age'><?= $model->tel_hab  ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Otro Tel. </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='signup'><?= $model->tel_otro ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Email </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='login'> <?= $model->email  ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Profesion </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->idProf->denominacion ?></span>
    </div>
  </div>

<div class='profile-info-row'>
<div class='profile-info-name'> Sexo </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='username'><?php echo $model->getHtmlSexo() ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Edo Civil </div>

    <div class='profile-info-value'>

      <span class='editable editable-click' id='username'><?php echo $model->getHtmlEdoCivil() ?></span>

    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Nacionalidad </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='age'><?= $model->getHtmlNacionalidad()  ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Lateralidad </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='signup'><?= $model->getHtmlLateralidad() ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Email </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='login'> <?= $model->email  ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Usa Lentes </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->getHtmlUsaLentes() ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Gurpo Sanguineo </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->idProf->denominacion ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Estatura </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->estatura ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Peso</div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->peso ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Talla Calzado </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->talla_cal ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Talla de Camiza </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->getHtmlTallaCamiza() ?></span>
    </div>
  </div>

  <div class='profile-info-row'>
    <div class='profile-info-name'> Talla de Pantalon </div>

    <div class='profile-info-value'>
      <span class='editable editable-click' id='about'><?= $model->talla_pantalon ?></span>
    </div>
  </div>
  </div>



<div class='space-20'></div>
