<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bm3Detail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bm3-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bm3')->textInput() ?>

    <?= $form->field($model, 'id_bien')->textInput() ?>

    <?= $form->field($model, 'is_recovered')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
