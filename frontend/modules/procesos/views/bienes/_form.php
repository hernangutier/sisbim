<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dias_garantia')->textInput() ?>

    <?= $form->field($model, 'id_resp_directo')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'notasigned')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isvehicle')->textInput() ?>

    <?= $form->field($model, 'id_vehicle')->textInput() ?>

    <?= $form->field($model, 'foto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_und_actual')->textInput() ?>

    <?= $form->field($model, 'isasigned')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_clas')->textInput() ?>

    <?= $form->field($model, 'fcreacion')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'operativo')->textInput() ?>

    <?= $form->field($model, 'tipobien')->textInput() ?>

    <?= $form->field($model, 'id_lin')->textInput() ?>

    <?= $form->field($model, 'localizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fdesinc')->textInput() ?>

    <?= $form->field($model, 'pendientedesinc')->textInput() ?>

    <?= $form->field($model, 'undmedida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aplicaiva')->textInput() ?>

    <?= $form->field($model, 'existe')->textInput() ?>

    <?= $form->field($model, 'id_cat')->textInput() ?>

    <?= $form->field($model, 'statusfisical')->textInput() ?>

    <?= $form->field($model, 'disponibilidad')->textInput() ?>

    <?= $form->field($model, 'foto1')->textInput() ?>

    <?= $form->field($model, 'mantenimiento')->textInput() ?>

    <?= $form->field($model, 'estado_uso')->textInput() ?>

    <?= $form->field($model, 'estado_fisico')->textInput() ?>

    <?= $form->field($model, 'old_cod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activo')->textInput() ?>

    <?= $form->field($model, 'is_colectivo')->checkbox() ?>

    <?= $form->field($model, 'motivo_indisponibilidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_in')->checkbox() ?>

    <?= $form->field($model, 'is_asegurable')->checkbox() ?>

    <?= $form->field($model, 'id_color')->textInput() ?>

    <?= $form->field($model, 'pend_in_mov')->checkbox() ?>

    <?= $form->field($model, 'etiquetar')->checkbox() ?>

    <?= $form->field($model, 'desincorporar')->checkbox() ?>

    <?= $form->field($model, 'no_ubicado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
