<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FactProductos;
/* @var $this yii\web\View */
/* @var $model common\models\FactProductosPrecios */



?>
<?php
    $prod=FactProductos::findOne(['id_precio'=>$model->id]);

 ?>


 <address>
 	<strong>Producto: </strong>

 	<br>
  <abbr title="Referencia">R:</abbr>
  <?= $prod->ref  ?>
 	<br>
  <abbr title="Descripcion">D:</abbr>
  <?= $prod->descripcion  ?>
 	<br>
  <abbr title="Costo Actual">Cost:</abbr>
  <code><?= number_format($model->new_costo,2)  ?></code> 
 	<br>

 </address>



<div class="row">







  <div class="col-sm-4">

    <div class="profile-user-info profile-user-info-striped">

      <div class="profile-info-row">
        <div class="profile-info-name"> Precio1 </div>

        <div class="profile-info-value">
          <?=  number_format($model->p1,2) ?>
        </div>
      </div>

      <div class="profile-info-row">
        <div class="profile-info-name"> % Utilidad </div>

        <div class="profile-info-value">
          <?= number_format($model->percent_p1,2)?>
        </div>
      </div>

      <div class="profile-info-row">
        <div class="profile-info-name"> Utilidad </div>

        <div class="profile-info-value">

          <?= number_format($model->p1,2)?>

        </div>
      </div>



  </div>

</div>


<div class="col-sm-4">
  <div class="profile-user-info profile-user-info-striped">

    <div class="profile-info-row">
      <div class="profile-info-name"> Precio2 </div>

      <div class="profile-info-value">
        <?=  number_format($model->p2,2) ?>
      </div>
    </div>

    <div class="profile-info-row">
      <div class="profile-info-name"> % Utilidad </div>

      <div class="profile-info-value">
        <?= number_format($model->percent_p2,2)?>
      </div>
    </div>

    <div class="profile-info-row">
      <div class="profile-info-name"> Utilidad </div>

      <div class="profile-info-value">

        <?= number_format($model->p1,2)?>

      </div>
    </div>



</div>

</div>



<div class="col-sm-4">
  <div class="profile-user-info profile-user-info-striped">

    <div class="profile-info-row">
      <div class="profile-info-name"> Precio3 </div>

      <div class="profile-info-value">
        <?=  number_format($model->p3,2) ?>
      </div>
    </div>

    <div class="profile-info-row">
      <div class="profile-info-name"> % Utilidad </div>

      <div class="profile-info-value">
        <?= number_format($model->percent_p3,2)?>
      </div>
    </div>

    <div class="profile-info-row">
      <div class="profile-info-name"> Utilidad </div>

      <div class="profile-info-value">

        <?= number_format($model->p1,2)?>

      </div>
    </div>



</div>

</div>



</div>
