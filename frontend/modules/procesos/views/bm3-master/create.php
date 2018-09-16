<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bm3Master */

$this->title = 'Aperturar Registro de 60 Faltantes';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
                  'model' => $model,
              ]) ?>


</div>
