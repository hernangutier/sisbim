<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\Nominas;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Nominas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nominas-form">

<?php
        echo Select2::widget([
              'model' => $model,
              'attribute' => 'id',
              'data' => ArrayHelper::map(Nominas::find()->asArray()->all(), 'id', 'denominacion'),
              'options' => ['placeholder' => 'Seleccione la Nomina...'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
        ]);

 ?>


</div>
