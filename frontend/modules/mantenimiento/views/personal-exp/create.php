<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PersonalExp */
/* @var $upload common\models\Uppload */

$this->title = 'Create Personal Exp';
$this->params['breadcrumbs'][] = ['label' => 'Personal Exps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




    <?= $this->render('_form', [
        'model' => $model,
        'upload'=>$upload,
    ]) ?>
