<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model commmon\models\FactProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-basicos">
  <div class="row">
    <div class="col-sm-7">


      <?= $form->field($model, 'ref', [
                    'addon' => ['prepend' => ['content'=>'<i class="fa fa-key"></i>']]
                      ])?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>


        <?php //-------------- Cargo -------------

            echo $form->field($model, 'id_lin')->widget(Select2::classname(), [

                 'data' => ArrayHelper::map(common\models\FactLineas::find()->asArray()->all(),'id','denominacion'),
                 'language' => 'es',
                 'addon' => [
                   'append' => [
                       'content' => Html::a('<i class="ace-icon fa fa-plus icon-only"></i>', '#', [
                           'id' => 'add',
                           'class' => 'btn btn-sm btn-primary',
                           'title' => 'Ingresar Linea...',
                           'data-toggle' => 'tooltip',
                           'data-url' => Url::to(['fact-poductos/addlinea']),
                         ]),
                       'asButton' => true
                   ]
                  ],

                 'options' => ['placeholder' => 'Seleccione la Linea'],
                 'pluginOptions' => [
                 'allowClear' => true
                 ],

                 ]);

         ?>



        <?php //-------------- Cargo -------------

            echo $form->field($model, 'id_marca')->widget(Select2::classname(), [

                 'data' => ArrayHelper::map(common\models\FactMarcas::find()->asArray()->all(),'id','denominacion'),
                 'language' => 'es',
                 'addon' => [

                     'append' => [
                         'content' => Html::a('<i class="ace-icon fa fa-plus icon-only"></i>', '#', [
                             'id' => 'add',
                             'class' => 'btn btn-sm btn-primary',
                             'title' => 'Ingresar Marca...',
                             'data-toggle' => 'tooltip',
                             'data-url' => Url::to(['oficios-out/asignar','id_remesa'=>$model->id]),
                           ]),
                         'asButton' => true
                     ]
                 ],
                 'options' => ['placeholder' => 'Seleccione la Marca'],
                 'pluginOptions' => [
                 'allowClear' => true
                 ],

                 ]);

         ?>

  </div>
<div class="col-sm-5">
  <h4 class="lighter">
    <i class="ace-icon fa fa-money icon-animated-hand-pointer blue"></i>
    <a href="#modal-wizard" data-toggle="modal" class="blue"> Presentacion </a>
  </h4>
      <?= $form->field($model, 'multiplo_empaque')->textInput(['maxlength' => true]) ?>

</div>

</div>
</div>
