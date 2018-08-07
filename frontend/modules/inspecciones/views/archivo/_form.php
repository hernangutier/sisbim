<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use common\models\Archivo;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;
use kartik\dialog\Dialog;
use kartik\helpers\Enum;

/* @var $this yii\web\View */
/* @var $model common\models\Archivo */
/* @var $form yii\widgets\ActiveForm */
?>

<?php echo Dialog::widget(); ?>



    <?php $form = ActiveForm::begin(); ?>
<fieldset>
<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model, 'nexp', [
      'addon' => ['prepend' => ['content'=>'<i class="fa fa-barcode"></i>']]
        ])->widget('yii\widgets\MaskedInput', [
        'mask' => '9999'
    ])?>
  </div>
  <div class="col-sm-6">
    <?= $form->field($model, 'ano_in')->dropDownList(
                    Enum::yearList(1900, 2018, true, false)
                  )
    ?>
  </div>
</div>


		<?= $form->field($model, 'identificacion')->textarea(['maxlength' => true]) ?>
<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model, 'tipo_inmueble')->dropDownList(
										Archivo::getListTipo()
									)
		?>
  </div>
  <div class="col-sm-6">
    <?php //-------------- Lineas -------------

       echo $form->field($model, 'id_ubic')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(common\models\ArchivoUbicaciones::find()->all(),'id',
                 function($model, $defaultValue) {
                    return $model->referencia;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione la Ubicacion Fisica ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>
  </div>
</div>



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
