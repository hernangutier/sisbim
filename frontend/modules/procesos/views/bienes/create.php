<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bienes */

$this->title = Yii::t('app', 'Registrar Bien Mueble en Custodia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes en Custodia'), 'url' => ['index-cuido']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
