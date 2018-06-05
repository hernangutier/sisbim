<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\AuConstancias */

$this->title = 'Datos de la Constancia Laboral : ' . $model->n_verificacion;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">


  <div class="btn-toolbar">

    <div class="btn-group">
                          <button class="btn btn-default">Ir a</button>

                          <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                            <span class="ace-icon fa fa-caret-down icon-only"></span>
                          </button>

                          <ul class="dropdown-menu dropdown-success">
                            <li>
                              <a href="<?= Url::home() ?>">Inicio</a>
                            </li>

                            <li>
                              <a href="<?= Url::to(['cargos/index']) ?>">Constancias</a>
                            </li>


                          </ul>
  </div>
      <a href="<?= Url::to(['cargos/update','id'=>$model->id]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-print align-top bigger-125"></i>
                              Imprimir
      </a>
  </div>



<div class="space-10"> </div>

  <div class="widget-box transparent">
  					<div class="widget-header widget-header-small">
  						<h4 class="widget-title smaller">
  							<i class="ace-icon fa fa-newspaper-o bigger-110"></i>
  																	   Datos de la Constancia Laboral
  						</h4>
  					</div>
  <div class="space-10"> </div>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">Referencia </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><code>   <?= $model->getReferencia() ?></code></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Cedula </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->idInt->cedrif ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Nombres y Apellidos</div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->idInt->getNombreComplete()   ?></span>
                      </div>
                    </div>






  </div>

</div>

</div>
