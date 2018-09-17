<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaDesincBmDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sa-desinc-bm-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_des')->textInput() ?>

    <?= $form->field($model, 'id_bien')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
