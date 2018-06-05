<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Proveedores */

$this->title = 'Informacion del Proveedor: ' . $model->razon;
$this->params['breadcrumbs'][] = ['label' => 'Proveedores', 'url' => ['index']];
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
                              <a href="<?= Url::to(['proveedores/index']) ?>">Proveedores</a>
                            </li>


                          </ul>
  </div>
      <a href="<?= Url::to(['proveedores/update','id'=>$model->id]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
  </div>



<div class="space-10"> </div>

  <div class="widget-box transparent">
  					<div class="widget-header widget-header-small">
  						<h4 class="widget-title smaller">
  							<i class="ace-icon fa fa-newspaper-o bigger-110"></i>
  																	   Datos Basicos
  						</h4>
  					</div>
  <div class="space-10"> </div>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">Rif </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><code>   <?= $model->rif ?></code></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Razon Social </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->razon ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Dirección Fiscal </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->direccion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Telefono </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->telefono ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Fax </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->fax ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> E-Mail </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->email ?></span>
                      </div>
                    </div>





  </div>

</div>


<div class='space-20'></div>


<div class='row'>
<div class='tabbable'>
        <ul class='nav nav-tabs padding-12 tab-color-blue background-blue' id='myTab4'>
          <li class='active'>
            <a data-toggle='tab' href='#home4' aria-expanded='false'>
              <i class='ace-icon fa fa-credit-card bigger-110'></i>
                                     Estados de Cuenta

            </a>
          </li>

          <li class=''>
            <a data-toggle='tab' href='#profile4' aria-expanded='false'>
              <i class='ace-icon fa fa-percent bigger-110'></i>
                                     Descuentos en Pronto Pago</a>
          </li>

          <li class=''>
            <a data-toggle='tab' href='#dropdown14' aria-expanded='true'>
               <i class='ace-icon fa 	fa-cubes bigger-110'></i>Productos Suministrados
            </a>
          </li>

          <li class=''>
            <a data-toggle='tab' href='#dropdown14' aria-expanded='true'>
               <i class='ace-icon fa 	fa-cubes bigger-110'></i>Reporte de Operaciones
            </a>
          </li>

          <li class=''>
            <a data-toggle='tab' href='#permises' aria-expanded='true'>
                <i class='ace-icon fa fa-line-chart bigger-110'></i>Estadisticas y Proyecciones
            </a>
          </li>

        </ul>

        <div class='tab-content'>
          <div id='home4' class='tab-pane active'>
            <?php
                 //echo ('view');
                 echo Yii::$app->controller->renderPartial('_view_estado_cuenta',['model'=>$model]);
            ?>
          </div>

          <div id='profile4' class='tab-pane'>
            <?php
              //echo ('view');
              echo Yii::$app->controller->renderPartial('_view_pronto_pago',['model'=>$model,'items'=>new common\models\ProvProntoPago()]);
            ?>
          </div>

          <div id='dropdown14' class='tab-pane'>
            <?php
                    //echo ('view');
                    echo Yii::$app->controller->renderPartial('_productos',['model'=>$model]);
             ?>
          </div>
          <div id='constantes' class='tab-pane'>
            <?php
                    echo ('view');
                    //echo Yii::$app->controller->renderPartial('_constantes',['model'=>$model]);
             ?>
          </div>
          <div id='permises' class='tab-pane'>
            <?php
                  echo ('view');
                    //echo Yii::$app->controller->renderPartial('_permises',['model'=>$model]);
             ?>
          </div>

        </div>
      </div>

</div>

</div>
