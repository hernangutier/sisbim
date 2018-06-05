<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\widgets\TouchSpin;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model commmon\models\FactProductos */
/* @var $price commmon\models\FactProductosPrecios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-facturacion">

  <div class="row">
    <div class="col-sm-3">
      <?=
        $form->field($model, 'aplica_iva')->widget(SwitchInput::classname(), [
                  'pluginOptions' => [
                  'size' => 'large',
                  'onColor' => 'success',
                  'offColor' => 'danger',
                  'onText' => 'Si',
                  'offText' => 'No',
              ]

          ]);
      ?>
    </div>
    <div class="col-sm-9">
      <?= $form->field($price, 'tasa_iva')->dropDownList(
                       common\models\FactProductos::getLis_iva()
                     )


       ?>
    </div>
  </div>

  <div class="row">
      <div class="col-sm-3">

    <h4 class="lighter">
			<i class="ace-icon fa fa-money icon-animated-hand-pointer pink"></i>
			<a href="#modal-wizard" data-toggle="modal" class="pink"> Costos </a>
		</h4>

        <?=  $form->field($price, 'old_costo')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>
        <?=  $form->field($price, 'new_costo')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

        <?=  $form->field($price, 'avg_costo')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

      </div>

      <div class="col-sm-3">
        <h4 class="lighter">
    			<i class="ace-icon fa fa-money icon-animated-hand-pointer green"></i>
    			<a href="#modal-wizard" data-toggle="modal" class="green"> Precio1 </a>
    		</h4>

        <?=  $form->field($price, 'percent_p1')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>
        <?=  $form->field($price, 'pvp_sin_iva1')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

        <?=  $form->field($price, 'p1')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

      </div>

      <div class="col-sm-3">
        <h4 class="lighter">
    			<i class="ace-icon fa fa-money icon-animated-hand-pointer blue"></i>
    			<a href="#modal-wizard" data-toggle="modal" class="blue"> Precio2 </a>
    		</h4>
        <?=  $form->field($price, 'percent_p2')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>
        <?=  $form->field($price, 'pvp_sin_iva2')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

        <?=  $form->field($price, 'p2')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

      </div>

      <div class="col-sm-3">
        <h4 class="lighter">
    			<i class="ace-icon fa fa-money icon-animated-hand-pointer red"></i>
    			<a href="#modal-wizard" data-toggle="modal" class="red"> Precio3 </a>
    		</h4>
        <?=  $form->field($price, 'percent_p3')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>
        <?=  $form->field($price, 'pvp_sin_iva3')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

        <?=  $form->field($price, 'p3')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
            'allowNegative' => false
            ]
        ]);
        ?>

      </div>
  </div>








</div>







</div>
