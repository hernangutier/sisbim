<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Bienes;
/* @var $this yii\web\View */
/* @var $model common\models\IncBm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inc-bm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->dropDownList(
                    Bienes::getListTiposAdquisicion()
                  )
    ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'periodo')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref')->textInput() ?>

    <?= $form->field($model, 'id_origen')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
