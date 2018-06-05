<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use \kartik\switchinput\SwitchInput;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
/* @var $url yii\helpers\Url */

$this->title = 'Ajustar a la Adecuación el Bien: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Bienes', 'url' => [$url]];
$this->params['breadcrumbs'][] = $this->title;
?>









    <div class="col-sm-offset-3 col-sm-6">
                  <?= $this->render('_form', [
            					'model' => $model,
        					]) ?>


    </div>
