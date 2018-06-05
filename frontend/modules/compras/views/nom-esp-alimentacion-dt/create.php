<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacionDt */

$this->title = 'Create Nom Esp Alimentacion Dt';
$this->params['breadcrumbs'][] = ['label' => 'Nom Esp Alimentacion Dts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nom-esp-alimentacion-dt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
