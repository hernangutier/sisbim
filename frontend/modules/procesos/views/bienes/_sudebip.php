<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use common\models\Bienes;


/* @var $this yii\web\View */
/* @var $model common\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-form">ar
          <div class="row">
              <div class="col-sm-6">
                <?= $form->field($model, 'estado_uso')->dropDownList(
                                Bienes::getListEstadosUso()
                              )
                ?>
              </div>
              <div class="col-sm-6">
                <?= $form->field($model, 'estado_fisico')->dropDownList(
                                Bienes::getListEstadosFisico()
                              )
                ?>
              </div>
          </div>

</div>
