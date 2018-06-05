<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use kartik\dialog\Dialog;
use xj\bootbox\BootboxAsset;
use yii\helpers\Url;

BootboxAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Personal */

$this->title = 'Datos del Integrante N.I: '. $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => 'Integrantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
    //----------- Rgistramos los scripts de apertura de formularios
    $this->registerJs("
      //------------- Familiares --------------------
      jQuery(document).ready(function($){
        $(document).ready(function () {
            //------- Abrir Familiares ----
            $(document).on('click', '#activity-index-link', (function() {
                $('#modal .header').text('Registro de Familiares!');
                $.get(
                    $(this).data('url'),
                    function (data) {

                        $('.modal-body').html(data);
                        $('#modal').modal();
                    }
                );
            }));
          //-------------------------------------------
          //--------   Ver Datos del Familiar ---------
          $(document).on('click', '#activity-index-link1', (function() {
              $('#modal .header ').text('Ver datos del familiar!');
              $.get(
                  $(this).data('url'),
                  function (data) {
                      $('.modal-body').html(data);
                      $('#modal').modal();
                  }
              );
          }));
          //----------------------------------------------
          //-------- abrir fomulario de antiguedad -------

          $('#btn-antiguedad').click(function (){
              $('#modal .header').text('Registrar Antiguedad');
              $('#modal').modal('show')
              .find('.modal-body')
              .load($(this).attr('value'));

          })

          $('.editar-antiguedad').click(function (){
              $('#modal .header').text('Modificar Antiguedad');
              $('#modal').modal('show')
              .find('.modal-body')
              .load($(this).data('url'));

          })

          //------------------- Expedientes ------------------
          $('.folio').click(function (){
              $('#modal .header').text('Agregar Folio');
              $('#modal').modal('show')
             .find('.modal-body')
             .load($(this).attr('value'));

          })
          //--------------------------------------------------
          //------------------- Permisos ------------------
          $('#btn-permiso').click(function (){
              $('#modal .header').text('Registrar Permiso o Falta');
              $('#modal').modal('show')
              .find('.modal-body')
              .load($(this).attr('value'));
            })
          //-------------------------------------------------------

          //------------------- Cargar Foto ------------------
          $('#foto').click(function (){
            //alert($(this).data('url'));
            $('#modal .header').text('Cargar Fotografia');
            $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
          })

      });
    });
    ");
 ?>


 <?php
 //----------- Formulario Modal Unico Universal ----
       Modal::begin([
           'id' => 'modal',
           'header' => '<h3 class="header blue lighter smaller">
 											<i class="ace-icon fa fa-users smaller-90"></i>
 										   Form
 										</h3>',


           'footer' => '<a href="#" class="btn btn-white btn-default btn-round" data-dismiss="modal">
 												<i class="ace-icon fa fa-times red2"></i>
 												Cancelar
 											</a>',


       ]);

       echo "<div class='well'></div>";

       Modal::end();
 ?>

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
                            <a href="<?= Url::to(['personal/index']) ?>">Personal</a>
                          </li>


                        </ul>
</div>
    <a href="<?= Url::to(['personal/update','id'=>$model->id]) ?>" class="btn btn-primary">
                            <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                            Actualizar
    </a>
</div>

<div class='space-10'></div>


<div class="row">
      <div class="col-xs-6 col-sm-3">
        <?php
              echo Yii::$app->controller->renderPartial('_view_left',['model'=>$model]);
        ?>
      </div>
      <div class="col-xs-12 col-lg-6 col-sm-9">


        <div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#basicos">
														<i class="blue ace-icon fa fa-newspaper-o bigger-110"></i>
														Datos Basicos
													</a>
												</li>

                        <li >
                          <a data-toggle="tab" href="#personales">
                            <i class="blue fa fa-address-book bigger-110"></i>
                            Datos Personales
                          </a>
                        </li>

                        <li >
                          <a data-toggle="tab" href="#laborales">
                            <i class="blue fa fa fa-handshake-o bigger-110"></i>
                            Datos Laborales
                          </a>
                        </li>

                        <li >
                          <a data-toggle="tab" href="#adicionales">
                            <i class="blue fa fa fa-info-circle bigger-110"></i>
                            Datos Adicionales
                          </a>
                        </li>

											</ul>

											<div class="tab-content">
												<div id="basicos" class="tab-pane fade in active">
                          <?php
                                echo Yii::$app->controller->renderPartial('_view_basicos',['model'=>$model]);
                          ?>
												</div>

                        <div id="personales" class="tab-pane fade">
                          <?php
                                echo Yii::$app->controller->renderPartial('_view_personales',['model'=>$model]);
                          ?>
												</div>

                        <div id="laborales" class="tab-pane fade">
                          <?php
                                echo Yii::$app->controller->renderPartial('_view_laborales',['model'=>$model]);
                          ?>
												</div>

                        <div id="adicionales" class="tab-pane fade">
                          <?php
                                echo Yii::$app->controller->renderPartial('_view_adicionales',['model'=>$model]);
                          ?>
												</div>

												<div id="dropdown1" class="tab-pane fade">
													<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
												</div>

												<div id="dropdown2" class="tab-pane fade">
													<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.</p>
												</div>
											</div>
										</div>

      </div>

</div>






<h3 class="header smaller lighter blue">
											<i class="ace-icon fa fa-archive"></i>
										  Datos Referenciales
										</h3>

<div class='ref'>






              <div class='space-20'></div>


              <div class='row'>
              <div class='tabbable'>
											<ul class='nav nav-tabs padding-12 tab-color-blue background-blue' id='myTab4'>
												<li class='active'>
													<a data-toggle='tab' href='#home4' aria-expanded='false'>
              							<i class='ace-icon fa fa-users bigger-110'></i>
              																	   Familiares

              						</a>
												</li>

												<li class=''>
													<a data-toggle='tab' href='#profile4' aria-expanded='false'>
                            <i class='ace-icon fa fa-history bigger-110'></i>
              																	   Registros de Antiguedad</a>
												</li>

												<li class=''>
													<a data-toggle='tab' href='#constantes' aria-expanded='true'>Constantes de Nomina</a>
												</li>

                        <li class=''>
                          <a data-toggle='tab' href='#dropdown14' aria-expanded='true'>
                             <i class='ace-icon fa 	fa-folder-o bigger-110'></i>Expediente Digital
                          </a>
                        </li>

                        <li class=''>
													<a data-toggle='tab' href='#permises' aria-expanded='true'>
                              <i class='ace-icon fa 	 fa-user-times bigger-110'></i>Permisos y Suspenciones
                          </a>
												</li>

											</ul>

											<div class='tab-content'>
												<div id='home4' class='tab-pane active'>
                          <?php
                                echo Yii::$app->controller->renderPartial('_familia',['model'=>$model]);
                          ?>
												</div>

												<div id='profile4' class='tab-pane'>
                          <?php
                             echo Yii::$app->controller->renderPartial('_antiguedad',['model'=>$model]);
                          ?>
												</div>

												<div id='dropdown14' class='tab-pane'>
                          <?php
                                  echo Yii::$app->controller->renderPartial('_expediente_dig',['model'=>$model]);
                           ?>
												</div>
                        <div id='constantes' class='tab-pane'>
                          <?php
                                  echo Yii::$app->controller->renderPartial('_constantes',['model'=>$model]);
                           ?>
												</div>
                        <div id='permises' class='tab-pane'>
                          <?php
                                  echo Yii::$app->controller->renderPartial('_permises',['model'=>$model]);
                           ?>
												</div>

											</div>
										</div>

              </div>







              <div class='space-20'></div>



</div>
