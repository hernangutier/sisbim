<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RefTipoDocumentos */

$this->title = 'Actualizar Tipo  de Documento: ' . $model->denominacion;
$this->params['breadcrumbs'][] = ['label' => 'Referencia Tipo de Documentos', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


          <h3 class="header smaller lighter blue">
            <i class="ace-icon fa  fa-refresh"></i>
             Actualizar Tipo de Documento: <?= $model->denominacion ?>
          </h3>

                  <div class="widget-body">
                    <div class="widget-main">

                              <?= $this->render('_form', [
                                  'model' => $model,
                              ]) ?>

                      </div>
  								 </div>
  					</div>
