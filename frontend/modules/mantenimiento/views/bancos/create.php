<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bancos */

$this->title = 'Crear Banco';
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
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
