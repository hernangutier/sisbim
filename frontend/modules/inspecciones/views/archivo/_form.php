<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use frontend\models\Archivo;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model common\models\Archivo */
/* @var $form yii\widgets\ActiveForm */
?>

<?php echo Dialog::widget(); ?>



    <?php $form = ActiveForm::begin(); ?>
<fieldset>

	<?= $form->field($model, 'nexp', [
		'addon' => ['prepend' => ['content'=>'<i class="fa fa-barcode"></i>']]
			])->widget('yii\widgets\MaskedInput', [
			'mask' => '9999'
	])?>

		<?= $form->field($model, 'identificacion')->textarea(['maxlength' => true]) ?>

		<?= $form->field($model, 'tipo_inmueble')->dropDownList(
										Archivo::getListTipo()
									)
		?>


		<div class="row">
			<div class="col-sm-6">
					<?= $form->field($model, 'ubicacion')->textarea(['maxlength' => true]) ?>
			</div>
			<div class="col-sm-6">
				<?php //-------------- Lineas -------------

					 echo $form->field($model, 'id_mun')->widget(Select2::classname(), [

								'data' => ArrayHelper::map(common\models\SdbMunicipios::find()->where(['id_est'=>1])->all(),'id',
										 function($model, $defaultValue) {
												return $model->descripcion;
								}
				),
								'language' => 'es',

								'options' => ['placeholder' => 'Seleccione el Municipio ...'],
								'pluginOptions' => [
								'allowClear' => true
								],

								]);

				?>
			</div>
		</div>

		<?php

          echo  $form->field($model, 'is_register')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>






		<div class="widget-toolbox padding-8 clearfix">
			<div class="form-group">
					<?= Html::submitButton( ($model->isNewRecord) ? '<i class="ace-icon fa fa-floppy-o bigger-120 green "></i> Guardar' : '<i class="ace-icon fa fa-floppy-o bigger-120  "></i> Guardar' , ['class' => ($model->isNewRecord) ? 'btn btn-white btn-success btn-bold pull-right' : 'btn btn-white btn-primary btn-bold pull-right']  ) ?>
			</div>
		</div>

</fieldset>
    <?php ActiveForm::end(); ?>
