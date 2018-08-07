<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ArchivoDocumentos */

$this->title = 'Create Archivo Documentos';
$this->params['breadcrumbs'][] = ['label' => 'Archivo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivo-documentos-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
