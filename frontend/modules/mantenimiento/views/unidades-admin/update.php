<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UnidadesAdmin */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Unidades Funcionales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">





                        <h3 class="header smaller lighter blue">
    											<i class="ace-icon fa  fa-refresh"></i>
    											 Actualizar Unidad Funcional: <?= $model->codigo ?>
    										</h3>

                        <div class="widget-body">
                          <div class="widget-main">

                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>

                            </div>
                        </div>


</div>
