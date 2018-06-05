<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalCarga */


?>

<?php $form = ActiveForm::begin([
  'id' => 'datos-familiar-form',
  'enableAjaxValidation' => true,
  'enableClientScript' => true,
  'enableClientValidation' => true,
]); ?>

<div class="profile-user-info profile-user-info-striped">

  <div class="profile-info-row">
    <div class="profile-info-name"> Cedula o N° de Partida de Nacimiento </div>

    <div class="profile-info-value">
      <span class="editable editable-click" id="username"><?php echo $model->ced ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Apellidos </div>

    <div class="profile-info-value">
      <span class="editable editable-click" id="username"><?php echo $model->apellidos ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Nombres </div>

    <div class="profile-info-value">
      <i class="fa fa-map-marker light-orange bigger-110"></i>
      <span class="editable editable-click" id="username"><?php echo $model->nombres ?></span>

    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Edad Actual </div>

    <div class="profile-info-value">
      <span class="editable editable-click" id="age"><?= $model->getEdadAnos() ?></span>
    </div>
  </div>



  <div class="profile-info-row">
    <div class="profile-info-name"> Fecha de Nacimiento </div>

    <div class="profile-info-value">
      <span class="editable editable-click" id="login"> <?= $model->fnac  ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Parentezco </div>

    <div class="profile-info-value">
      <span class="editable editable-click" id="login"> <?= $model->getParentesco()  ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Sexo </div>

    <div class="profile-info-value">
       <?= $model->getSexoHtml(); ?>
    </div>
  </div>




</div>

  <?php ActiveForm::end(); ?>
