<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FactPedidosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fact-pedidos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'id_client') ?>

    <?= $form->field($model, 'id_vend') ?>

    <?= $form->field($model, 'date_creation') ?>

    <?php // echo $form->field($model, 'date_reception') ?>

    <?php // echo $form->field($model, 'date_facturacion') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
