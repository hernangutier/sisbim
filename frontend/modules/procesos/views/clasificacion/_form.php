<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Clasificacion */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ($model->isNewRecord) ? '<div class="widget-box widget-color-green" ><div class="widget-header">
	<h4 class="widget-title">Nueva Clasificación</h4>
</div>' : '<div class="widget-box widget-color-blue2" > <div class="widget-header">
	<h4 class="widget-title">Actualizar : ' . $model->descripcion . '</h4>
</div>' ?>


											<div class="widget-body">
												<div class="widget-main no-padding">


    <?php $form = ActiveForm::begin(); ?>
<fieldset>
    <div class="row">
      <div class="col-sm-4">
          <?= $form->field($model, 'grupo')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'subgrupo')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'seccion')->textInput(['maxlength' => true]) ?>
      </div>


    </div>

		<?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>




</fieldset>


</div>
<div class="widget-toolbox padding-8 clearfix">
	<div class="form-group">
			<?= Html::submitButton( ($model->isNewRecord) ? '<i class="ace-icon fa fa-floppy-o bigger-120 green "></i> Guardar' : '<i class="ace-icon fa fa-floppy-o bigger-120  "></i> Guardar' , ['class' => ($model->isNewRecord) ? 'btn btn-white btn-success btn-bold pull-right' : 'btn btn-white btn-primary btn-bold pull-right']  ) ?>
	</div>
</div>
  <?php ActiveForm::end(); ?>
</div>
</div>
