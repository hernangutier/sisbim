
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\DivInspecciones */

?>


  <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active">
                    <a data-toggle="tab" href="#generales">
                      <i class="blue ace-icon fa fa-newspaper-o bigger-110"></i>
                      Semovientes
                    </a>
                  </li>

                  <li >
                    <a data-toggle="tab" href="#bienes">
                      <i class="blue fa fa-address-book bigger-110"></i>
                      Bienes Muebles
                    </a>
                  </li>

                  <li >
                    <a data-toggle="tab" href="#poliza">
                      <i class="blue fa fa fa-handshake-o bigger-110"></i>
                      Inmuebles o Infraestructura
                    </a>
                  </li>

                  <li >
                    <a data-toggle="tab" href="#archivo">
                      <i class="blue fa fa fa-info-circle bigger-110"></i>
                      Enceres y Herramientas
                    </a>
                  </li>

                </ul>

                <div class="tab-content">
                  <div id="generales" class="tab-pane fade in active">
                    <?php
                        echo Yii::$app->controller->renderPartial('_semovientes',['model'=>$model]);

                    ?>
                  </div>

                  <div id="bienes" class="tab-pane fade">

                    <?php
                        echo Yii::$app->controller->renderPartial('_bienes',['model'=>$model]);

                    ?>

                  </div>

                  <div id="poliza" class="tab-pane fade">
                    <div class="widget-body">
                      <div class="alert alert-info">
                           <button type="button" class="close" data-dismiss="alert">
                             <i class="ace-icon fa fa-times"></i>
                           </button>
                           <strong>Upps!</strong>
                           Opcion en desarrollo
                           <br>
                      </div>
                    </div>
                  </div>

                  <div id="archivo" class="tab-pane fade">
                    <div class="alert alert-info">
                         <button type="button" class="close" data-dismiss="alert">
                           <i class="ace-icon fa fa-times"></i>
                         </button>
                         <strong>Upps!</strong>
                         Opcion en desarrollo
                         <br>
                    </div>
                  </div>


                </div>
      </div>
