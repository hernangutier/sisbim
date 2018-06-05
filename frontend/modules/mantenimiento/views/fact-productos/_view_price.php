<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FactProductosPrecios */



?>

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
