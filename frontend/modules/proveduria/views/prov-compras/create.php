<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProvCompras */

$this->title = 'Nueva Compra';

$this->params['breadcrumbs'][] = $this->title;
?>





    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
