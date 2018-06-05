<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Cargos */

$this->title = 'Datos de la Empresa:';
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




                          </ul>
  </div>
      <a href="<?= Url::to(['/empresa/update','id'=>$model->id]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
  </div>





  <h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Datos de la Empresa
         </span>
  </h4>

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
                      <div class="profile-info-name"> Dirección </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->direccion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Telefono de Contacto</div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->tel ?></span>
                      </div>
                    </div>




  </div>



</div>
