<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bienes */

$this->title = Yii::t('app', 'Crear Bien Mueble');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
