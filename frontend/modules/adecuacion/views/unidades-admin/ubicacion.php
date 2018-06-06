<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\UnidadesAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidades-admin-form">



	<?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>
	<?php //-------------- Contactos -------------

       echo $form->field($model, 'id_und_superior')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(common\models\UnidadesAdmin::find()->all(),'id',
                 function($model, $defaultValue) {
                    return $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Unidad Superior ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>

	<?php //-------------- Contactos -------------

       echo $form->field($model, 'id_sede')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(common\models\SdbSedes::find()->all(),'id',
                 function($model, $defaultValue) {
                    return $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Sede ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>
    <?php //-------------- Contactos -------------

       echo $form->field($model, 'id_resp')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(common\models\Responsables::find()->all(),'id',
                 function($model, $defaultValue) {
                    return $model->nombres . '  ' .$model->apellidos;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione el Encargado ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>


		<?php

          echo  $form->field($model, 'disponible_inc')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>







</div>
