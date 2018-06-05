<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model common\models\Bm3 */
/* @var $searchModel common\models\Bm3DtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Desincorporar por Concepto 60 Faltantes BM3';
$this->params['breadcrumbs'][] = ['label' => 'Desincoporaciones por Concepto 60 Faltantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo Dialog::widget(); ?>

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
													<i class="ace-icon fa fa-hand-o-left red2"></i>
													Desincorporarcion por 60 Faltantes
												</h3>

												<div class="widget-toolbar no-border invoice-info">


													<span class="invoice-info-label">Creado el:</span>
													<span class="blue"><?= $model->date_creation ?></span>

                          <br>
													<span class="invoice-info-label">Periodo:</span>
													<span class="blue"><?= $model->periodo->descripcion ?></span>
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
