<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model common\models\Responsables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-form">


	<?php //-------------- Contactos -------------

       echo $form->field($model, 'id_unidad')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(common\models\UnidadesAdmin::find()->all(),'id',
                 function($model, $defaultValue) {
                    return $model->codigo . ' ' .$model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Unidad de Adscripción ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>

    <?= $form->field($model, 'tipo')->dropDownList(
                    ['D'=>'Administrativo',
                    'U'=>'Usuario Directo',
                    'C'=>'Cuido',
                    ]
                  )


    ?>


    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

		<?php

          echo  $form->field($model, 'is_max')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>


		<?php
       if (!$model->isNewRecord) {
				 echo  $form->field($model, 'activo')->widget(SwitchInput::classname(), [
									 'pluginOptions' => [
													 'onText' => 'Habilitado',
													 'offText' => 'Inhabilitado',
													 'onColor' => 'success',
													 'offColor' => 'danger',
									 ]

					 ]);
			 }


    ?>





</div>
