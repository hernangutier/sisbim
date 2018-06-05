<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cargos */

$this->title = 'Crear Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <h3 class="header smaller lighter green">
											<i class="ace-icon fa fa-file-o"></i>
											Nuevo
										</h3>

  												<div class="widget-body">
  													<div class="widget-main">


                              <?= $this->render('_form', [
                                  'model' => $model,
                              ]) ?>
                          </div>
                      </div>

  					</div>
