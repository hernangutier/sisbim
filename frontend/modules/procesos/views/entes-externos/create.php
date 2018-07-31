<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EntesExternos */

$this->title = 'Create Entes Externos';
$this->params['breadcrumbs'][] = ['label' => 'Entes Externos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entes-externos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
