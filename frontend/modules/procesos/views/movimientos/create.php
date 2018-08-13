<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Movimientos */

$this->title = 'Nuevo Traslado';
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
     $this->registerJs("
      $(document).ready(function() {
        window.history.pushState(null, '', window.location.href);
        window.onpopstate = function() {
           window.history.pushState(null, '', window.location.href);
         };
       })

       $(document).on('click', '.refresh', (function() {
          $.pjax.reload({container: '#grid-movimientos-dt'});

       }))

     ");
 ?>

<div class="col-sm-offset-3 col-sm-6">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
