<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lineas */

$this->title = 'Nueva Linea';
$this->params['breadcrumbs'][] = ['label' => 'Lineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
                  'model' => $model,
              ]) ?>


</div>
