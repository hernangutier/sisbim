<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bm3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bm3-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bien')->textInput() ?>

    <?= $form->field($model, 'id_bm3')->textInput() ?>

    <?= $form->field($model, 'date_caducidad')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'date_in')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
