<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProvArticulos */

$this->title = 'Crear Articulo';
$this->params['breadcrumbs'][] = ['label' => 'Insumos y Suministros.', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$this->registerJsFile(
    '@web/js/compras.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
 ?>
<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
