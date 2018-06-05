<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PersonalCarga */

$this->title = 'Create Personal Carga';
$this->params['breadcrumbs'][] = ['label' => 'Personal Cargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="personal-carga-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
