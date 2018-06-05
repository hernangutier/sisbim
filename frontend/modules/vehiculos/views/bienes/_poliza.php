<?php
use common\models\GvAccesoriosVehiculos;
use common\models\GvAccesoriosVehiculosSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Bienes */



?>



<?php
  $poliza=$model->getPoliza();
  if ($poliza==null) {
    echo '<div class="widget-main padding-6">
      <div class="alert alert-info"> Sin información! </div>
    </div>';

  } else {
  ?>
      <!-- datos de la Poliza -->

      <div class="profile-user-info profile-user-info-striped">
      												<div class="profile-info-row">
      													<div class="profile-info-name"> N° de Poliza </div>

      													<div class="profile-info-value">
      														<span class="editable editable-click" id="username"><?= $poliza->npoliza ?></span>
      													</div>
      												</div>

                              <div class="profile-info-row">
      													<div class="profile-info-name">Compañia Aseguradora</div>

      													<div class="profile-info-value">
      														<span class="editable editable-click" id="username"><?= $poliza->aseguradora->razon ?></span>
      													</div>
      												</div>

      												<div class="profile-info-row">
      													<div class="profile-info-name"> Lapsos de Cobertura </div>

      													<div class="profile-info-value">
      														<i class="fa fa-map-marker light-orange bigger-110"></i>
      															<span class="editable editable-click" id="city"><?= $poliza->f_ini  ?></span>
                                    <span class="editable editable-click" id="city"><?= $poliza->f_fin  ?></span>
      													</div>
      												</div>

      												<div class="profile-info-row">
      													<div class="profile-info-name"> Tipo de Cobertura </div>

      													<div class="profile-info-value">
      														<span class="editable editable-click" id="age"><?= $poliza->HelpersTipoCobertura()  ?></span>
      													</div>
      												</div>

      												<div class="profile-info-row">
      													<div class="profile-info-name"> Descripción del Tipo de Cobertura </div>

      													<div class="profile-info-value">
      														<span class="editable editable-click" id="signup"><?= $poliza->especifique_tipo_cobertura  ?></span>
      													</div>
      												</div>

      												<div class="profile-info-row">
      													<div class="profile-info-name"> Monto de Cobertura </div>

      													<div class="profile-info-value">
      														<span class="editable editable-click" id="login"><?= number_format($poliza->monto,2)   ?></span>
      													</div>
      												</div>

      												<div class="profile-info-row">
      													<div class="profile-info-name"> Estado de la Poliza </div>

      													<div class="profile-info-value">
      														<span class="editable editable-click" id="about"><?= $poliza->HelpersStatus()  ?></span>
      													</div>
      												</div>
      											</div>


  <?php
    }
  ?>
