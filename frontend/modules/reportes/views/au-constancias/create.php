<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AuConstancias */

$this->title = 'Generar Constancia Laboral';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
