<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\NomEspAlimentacionDtSearch;


/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacion */

$this->title = 'Nomina Esp. Alimentacion: ' .  $model->getPeriodo();
$this->params['breadcrumbs'][] = ['label' => 'Nom Esp Alimentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
    $this->registerJs("

      $(document).ready(function () {
          //------- Calcular ----
          $('#id-calcular').click(function (e){
              alert ('si');
              e.preventDefault();
              e.stopImmediatePropagation();


          })

          });
    ");
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
      <a href="<?= Url::to(['unidades-admin/update','id'=>$model->id]) ?>" class="btn btn-primary" id="id-calcular">
                              <i class="ace-icon fa fa-play align-top bigger-125"></i>
                              Calcular
      </a>

  </div>




          <h3 class="header smaller lighter blue">
                        <i class="ace-icon fa fa-bullhorn"></i>
                        Calcular Nomina Especial de Cesta Ticket
          </h3>


          <div class='space-12'></div>

          <div class='profile-user-info profile-user-info-striped'>
            <div class='profile-info-row'>
              <div class='profile-info-name'> Periodo a Calcular </div>

              <div class='profile-info-value'>
                <span class='editable editable-click' id='username'><?php echo $model->getPeriodo() ?></span>
              </div>
            </div>

            <div class='profile-info-row'>
              <div class='profile-info-name'> Valor de la Unidad Tributaria </div>

              <div class='profile-info-value'>

                <span class='editable editable-click' id='username'>277.00</span>

              </div>
            </div>

            <div class='profile-info-row'>
              <div class='profile-info-name'> Base de Calculo </div>

              <div class='profile-info-value'>
                <span class='editable editable-click' id='age'>12 UT</span>
              </div>
            </div>

            <div class='profile-info-row'>
              <div class='profile-info-name'> Elaborada por:  </div>

              <div class='profile-info-value'>
                <i class='fa fa-map-marker light-orange bigger-110'></i>
                <span class='editable editable-click' id='username'>Hernan Gutierrez</span>

              </div>
            </div>



          </div>

          <div class='space-20'></div>

          <h3 class="header smaller lighter blue">
                        <i class="ace-icon fa fa-street-view"></i>
                        Integrantes
          </h3>

          <?php
          $searchModel = new NomEspAlimentacionDtSearch();
          $searchModel->id_nom=$model->id;
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                echo Yii::$app->controller->renderPartial('/nom-esp-alimentacion-dt/index',['dataProvider'=>$dataProvider,'searchModel'=>$searchModel]);
          ?>

</div>
