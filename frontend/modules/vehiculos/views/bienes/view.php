<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\dialog\Dialog;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model common\models\Bienes */

$this->title ='Información del Vehiculo';
$this->params['breadcrumbs'][] = ['label' => 'Registro del Parque Automotor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$this->registerJs("
$(document).on('click','.add',function (){

  $('.tl').text('Agregar Accesorio');
  $.get(

      $(this).data('url'),
      function (data) {
          $('.modal-body').html(data);
          $('#modal-accesorios').modal();
      }
  );


  });

  $(document).on('click','.add-poliza',function (){

    $('.tl').text('Registrar Poliza');
    $.get(

        $(this).data('url'),
        function (data) {
            $('.modal-body').html(data);
            $('#modal-accesorios').modal();
        }
    );


    });





");
?>

<?php
Modal::begin([
    'id' => 'modal-accesorios',
    'header' => '<h4 class="blue bigger tl">Nuevo Articulo</h4>',

]);

echo "<div class='well'></div>";

Modal::end();
?>

<div class="row">
  <div class="col-sm-4">
    <?= Yii::$app->controller->renderPartial('_left',['model'=>$model]); ?>
  </div>
 <hr>
  <div class="col-sm-8">

    <div class="tabbable">
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                      <a data-toggle="tab" href="#generales">
                        <i class="blue ace-icon fa fa-newspaper-o bigger-110"></i>
                        Datos del Bien
                      </a>
                    </li>

                    <li >
                      <a data-toggle="tab" href="#componentes">
                        <i class="blue fa fa-address-book bigger-110"></i>
                        Accesorios y Componentes
                      </a>
                    </li>

                    <li >
                      <a data-toggle="tab" href="#poliza">
                        <i class="blue fa fa fa-handshake-o bigger-110"></i>
                        Información de Poliza
                      </a>
                    </li>

                    <li >
                      <a data-toggle="tab" href="#archivo">
                        <i class="blue fa fa fa-info-circle bigger-110"></i>
                        Archivo Digital
                      </a>
                    </li>

                  </ul>

                  <div class="tab-content">
                    <div id="generales" class="tab-pane fade in active">
                      <?php
                          echo Yii::$app->controller->renderPartial('_generales',['model'=>$model]);
                      ?>
                    </div>

                    <div id="componentes" class="tab-pane fade">
                      <?php
                        echo Yii::$app->controller->renderPartial('_accesorios',['model'=>$model]);
                      ?>
                    </div>

                    <div id="poliza" class="tab-pane fade">
                      <div class="widget-body">
												<?php
                            echo Yii::$app->controller->renderPartial('_poliza',['model'=>$model]);
                         ?>
											</div>
                    </div>

                    <div id="archivo" class="tab-pane fade">
                      <?php
                          echo "HOLA"; //echo Yii::$app->controller->renderPartial('_view_adicionales',['model'=>$model]);
                      ?>
                    </div>


                  </div>
        </div>

  </div>
</div>
