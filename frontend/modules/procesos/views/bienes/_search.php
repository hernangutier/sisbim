<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BienesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'serial') ?>

    <?= $form->field($model, 'id_inc') ?>

    <?= $form->field($model, 'dias_garantia') ?>

    <?php // echo $form->field($model, 'id_resp_directo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <?php // echo $form->field($model, 'notasigned') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'isvehicle') ?>

    <?php // echo $form->field($model, 'id_vehicle') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'id_und_actual') ?>

    <?php // echo $form->field($model, 'isasigned') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'marca') ?>

    <?php // echo $form->field($model, 'id_clas') ?>

    <?php // echo $form->field($model, 'fcreacion') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'operativo') ?>

    <?php // echo $form->field($model, 'tipobien') ?>

    <?php // echo $form->field($model, 'id_lin') ?>

    <?php // echo $form->field($model, 'localizacion') ?>

    <?php // echo $form->field($model, 'fdesinc') ?>

    <?php // echo $form->field($model, 'pendientedesinc') ?>

    <?php // echo $form->field($model, 'undmedida') ?>

    <?php // echo $form->field($model, 'aplicaiva') ?>

    <?php // echo $form->field($model, 'existe') ?>

    <?php // echo $form->field($model, 'id_cat') ?>

    <?php // echo $form->field($model, 'statusfisical') ?>

    <?php // echo $form->field($model, 'disponibilidad') ?>

    <?php // echo $form->field($model, 'foto1') ?>

    <?php // echo $form->field($model, 'mantenimiento') ?>

    <?php // echo $form->field($model, 'estado_uso') ?>

    <?php // echo $form->field($model, 'estado_fisico') ?>

    <?php // echo $form->field($model, 'old_cod') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'is_colectivo')->checkbox() ?>

    <?php // echo $form->field($model, 'motivo_indisponibilidad') ?>

    <?php // echo $form->field($model, 'is_in')->checkbox() ?>

    <?php // echo $form->field($model, 'is_asegurable')->checkbox() ?>

    <?php // echo $form->field($model, 'id_color') ?>

    <?php // echo $form->field($model, 'pend_in_mov')->checkbox() ?>

    <?php // echo $form->field($model, 'aplica_garantia')->checkbox() ?>

    <?php // echo $form->field($model, 'id_modelo') ?>

    <?php // echo $form->field($model, 'etiquetar')->checkbox() ?>

    <?php // echo $form->field($model, 'desincorporar')->checkbox() ?>

    <?php // echo $form->field($model, 'no_ubicado')->checkbox() ?>

    <?php // echo $form->field($model, 'barcode') ?>

    <?php // echo $form->field($model, 'bm3')->checkbox() ?>

    <?php // echo $form->field($model, 'tipo_indisponibilidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
