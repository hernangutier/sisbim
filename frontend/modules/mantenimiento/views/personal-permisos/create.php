<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PersonalPermisos */

$this->title = 'Create Personal Permisos';
$this->params['breadcrumbs'][] = ['label' => 'Personal Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-permisos-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
