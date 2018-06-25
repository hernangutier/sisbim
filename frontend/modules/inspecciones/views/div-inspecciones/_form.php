<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Lineas */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ($model->isNewRecord) ? '<div class="widget-box widget-color-green"' : '<div class="widget-box widget-color-blue2"' ?>>
											<div class="widget-header">
												<h4 class="widget-title">Registrar Inspección</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">


    <?php $form = ActiveForm::begin(); ?>
<fieldset>
		<?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>


      <div class="row">
        <div class="col-sm-6">
          <?= $form->field($model,'f_ini')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Ingrese Fecha de Inicio...'],
          'pluginOptions' => [
              'autoclose'=>true,
                          'format'=>'yyyy-mm-dd',
          ]
          ])
          ?>
        </div>

        <div class="col-sm-6">
          <?= $form->field($model,'f_fin')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Ingrese Fecha de  Cierre...'],
          'pluginOptions' => [
              'autoclose'=>true,
                          'format'=>'yyyy-mm-dd',
          ]
          ])
          ?>

        </div>
      </div>

    </div>



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
