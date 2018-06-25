<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ProvInventarioIni */
/* @var $searchModel common\models\ProvInventarioIniDtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Toma de Inventario Inicial';
$this->params['breadcrumbs'][] = ['label' => 'Toma de Inventario Inicial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
													<i class="ace-icon fa fa-flask green"></i>
													Toma de Inventario Inicial
												</h3>

												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">Invoice:</span>
													<span class="red">#121212</span>

													<br>
													<span class="invoice-info-label">Date:</span>
													<span class="blue">04/04/2014</span>
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
                              <?php
                                  echo Yii::$app->controller->renderPartial('_center',['searchModel'=>$searchModel,'dataProvider'=>$dataProvider]);
                               ?>
                            </div>

                          </div>


												</div>
											</div>
	</div>
