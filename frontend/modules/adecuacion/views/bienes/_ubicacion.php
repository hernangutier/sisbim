<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use \kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-ubicacion">

<div class="row">
  <div class="col-sm-4">
    <?php

          echo  $form->field($model, 'is_colectivo')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>
  </div>
  <div class="col-sm-4">
    <?php

          echo  $form->field($model, 'sin_user')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>
  </div>



  <div class="col-sm-4">
    <?php

          echo  $form->field($model, 'no_ubicado')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>
  </div>




</div>

<div class="row">



    <div class="col-sm-6">
      <?php

            echo  $form->field($model, 'desincorporar')->widget(SwitchInput::classname(), [
                      'pluginOptions' => [
                              'onText' => 'Si',
                              'offText' => 'No',
                              'onColor' => 'success',
                              'offColor' => 'danger',
                      ]

              ]);

      ?>
    </div>


    <div class="col-sm-6">
      <?php

            echo  $form->field($model, 'etiquetar')->widget(SwitchInput::classname(), [
                      'pluginOptions' => [
                              'onText' => 'Si',
                              'offText' => 'No',
                              'onColor' => 'success',
                              'offColor' => 'danger',
                      ]

              ]);

      ?>
    </div>
  </div>




  <div class="row">
    <div class="col-sm-6">
      <?= $form->field($model, 'id_und_actual')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(common\models\UnidadesAdmin::find()->asArray()->all(), 'id', 'descripcion')
        ]); ?>
    </div>
    <div class="col-sm-6">
      <?=
        $form->field($model, 'id_resp_directo')->widget(DepDrop::classname(), [
        //'data'=> [6=>'Bank'],
        //'options' => ['placeholder' => 'Seleccione Estado'],
        'type' => DepDrop::TYPE_SELECT2,
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[

            'depends'=>[Html::getInputId($model, 'id_und_actual')],
            'url' => Url::to(['responsables']),
            'loadingText' => 'Cargando Responsables',

        ]
        ]); ?>
    </div>
  </div>






    <?= $form->field($model, 'localizacion')->textarea(['maxlength' => true]) ?>


</div>
