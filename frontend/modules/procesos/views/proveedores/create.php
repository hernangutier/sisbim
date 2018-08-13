<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */

$this->title = 'Crear Proveedor';
$this->params['breadcrumbs'][] = ['label' => 'Administrar Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
     $this->registerJs('
      $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
           window.history.pushState(null, "", window.location.href);
         };
       })

     ');
 ?>


<div class="col-sm-offset-3 col-sm-6">
              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>


</div>
