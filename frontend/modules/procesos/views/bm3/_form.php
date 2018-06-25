<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bm3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box widget-color-red3">
											<div class="widget-header">
												<h4 class="widget-title">Nuevo Registro BM3 (Concepto 60 Faltantes) N°: <?= $model->getNextRef()  ?></h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">

    <?php $form = ActiveForm::begin(); ?>
 <fieldset>


    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

</fieldset>

<div class="form-actions center">

  <?= Html::submitButton('<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> Guardar y Continuar ' , ['class' =>  'btn btn-sm btn-success' ]  ) ?>


</div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
