<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalExp */

$this->title = 'Update Personal Exp: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Exps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-exp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
