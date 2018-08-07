<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArchivoDocumentos */

$this->title = 'Update Archivo Documentos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Archivo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="archivo-documentos-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
