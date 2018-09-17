<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use kartik\dialog\Dialog;
use common\models\Periodos;
/* @var $this yii\web\View */
/* @var $model common\models\SaDesincBmMaster */
/* @var $searchModel common\models\SaDesincBmDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propuesta de Enajenacion de Bienes';
$this->params['breadcrumbs'][] = ['label' => 'Gestion de Propuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo Dialog::widget(); ?>


<?php
     $this->registerJs("
      $(document).ready(function() {
        window.history.pushState(null, '', window.location.href);
        window.onpopstate = function() {
           window.history.pushState(null, '', window.location.href);
         };
       })

       $(document).on('click', '.refresh', (function() {
          $.pjax.reload({container: '#grid-movimientos-dt'});

       }))

     ");
 ?>


<?php
//---------------   Script me controla la Tabla -------

$this->registerJsFile(
    '@web/js/inventario_init.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>


<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													<i class="ace-icon fa fa-retweet red"></i>
													Propuesta de Enajenación de Bienes
												</h3>

												<div class="widget-toolbar no-border invoice-info">


													<span class="invoice-info-label">Creado el:</span>
													<span class="blue"><?= $model->date_creation ?></span>

                          <br>
													<span class="invoice-info-label">Periodo:</span>
													<span class="blue"><?= isset($model->periodo) ? $model->periodo->descripcion : 'No Asignado' ?></span>
												</div>

												<div class="widget-toolbar hidden-480">
													<a href="#">
														<i class="ace-icon fa fa-print"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">

                          <div class="row">

                            <div class="col-sm-3">
                              <?php
                                  echo Yii::$app->controller->renderPartial('_left',['model'=>$model]);
                               ?>
                            </div>

                            <div class="col-sm-8">
                              <?=

                                   Yii::$app->controller->renderPartial('_center',['searchModel'=>$searchModel,'dataProvider'=>$dataProvider]);
                               ?>
                            </div>

                          </div>


												</div>
											</div>
	</div>
