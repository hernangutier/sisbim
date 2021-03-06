<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Cargos */

$this->title = 'Datos de la Unidad Funcional: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Unidades Funcionales', 'url' => ['index']];
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
                              <a href="<?= Url::to(['unidades-admin/index']) ?>">Unidades Funcionales</a>
                            </li>


                          </ul>
  </div>
      <a href="<?= Url::to(['unidades-admin/update','id'=>$model->id]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
  </div>



<div class="space-10"> </div>

  <div class="widget-box transparent">
  					<div class="widget-header widget-header-small">
  						<h4 class="widget-title smaller">
  							<i class="ace-icon fa fa-newspaper-o bigger-110"></i>
  																	   Datos de la Unidad Funcional
  						</h4>
  					</div>
  <div class="space-10"> </div>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">Código </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><code>   <?= $model->codigo ?></code></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Denominación </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->denominacion ?></span>
                      </div>
                    </div>





  </div>

</div>

</div>
