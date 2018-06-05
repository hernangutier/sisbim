<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\widgets\SwitchInput;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\ProvArtLineas;

/* @var $this yii\web\View */
/* @var $model app\models\ProvArticulos */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'id' => 'articulos-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>



                          <?= $form->field($model, 'ref', [

                            'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-barcode"></i>']]
                              ])?>

                          <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

                          <?php //-------------- Cargo -------------

                            echo $form->field($model, 'id_lin')->widget(Select2::classname(), [

                                 'data' => ArrayHelper::map(common\models\ProvArtLineas::find()->asArray()->all(),'id','descripcion'),
                                 'language' => 'es',
                                 'size' => Select2::SMALL,
                                 'options' => ['placeholder' => 'Seleccione la Linea'],
                                 'pluginOptions' => [
                                 'allowClear' => true
                                 ],
                               ]);

                         ?>

                         <div class="row">

                           <div class="col-sm-4">
                             <?= $form->field($model, 'und_empaque', [
                               'addon' => ['prepend' => ['content'=>'1/N']]
                             ])?>
                           </div>

                           <div class="col-sm-4">
                             <?= $form->field($model, 'und_mayor', [
                               'addon' => ['prepend' => ['content'=>'UND (+)']]
                             ])?>
                           </div>

                           <div class="col-sm-4">
                             <?= $form->field($model, 'und_menor', [
                               'addon' => ['prepend' => ['content'=>'UND (-)']]
                             ])?>
                           </div>

                         </div>

                        <div class="modal-footer">

                          <button class="btn btn-white btn-danger btn-bold" data-dismiss="modal">
    												<i class="ace-icon fa fa-times red2"></i>
    												Cancelar
											    </button>



                          <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 green "></i>Guardar', ['class' => 'btn btn-white btn-success btn-bold pull-right']) ?>


                         </div>


<?php ActiveForm::end(); ?>



<?php
$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#articulos-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
              $("#modal-inventario-init").modal("hide");

            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
?>
