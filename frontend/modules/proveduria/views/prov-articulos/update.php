<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProvArticulos */

$this->title = 'Actualizar Articulo: '. $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Insumos y Suministros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
