<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DivSemovientes */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'semovientes-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'nbov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput() ?>

    <?= $form->field($model, 'sexo')->textInput() ?>

    <?= $form->field($model, 'is_herrado')->checkbox() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#semovientes-form").on("beforeSubmit", function(e) {
                var form = $(this);
                $.post(
                    form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                  $.pjax.reload({container: "#grid-accesorios"});
                  $("#modal-accesorios").modal("hide");

                });
                return false;
            }).on("submit", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
        ');
    ?>
