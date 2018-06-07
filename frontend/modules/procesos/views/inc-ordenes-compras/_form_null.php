<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\Proveedores;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\Response;
use yii\web\JsExpression;
use kartik\editable\Editable;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\IncOrdenesNulls */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">


<?php $form = ActiveForm::begin([
    'id' => 'orden-anular-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>
      <fieldset>
          <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

      </fieldset>

      <div class="form-actions center">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green"></i> Guardar', ['class' => 'btn btn-white btn-success btn-bold']) ?>
      </div>

    <?php ActiveForm::end(); ?>
</div>
