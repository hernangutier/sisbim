<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NomEspAlimentacion */

$this->title = 'Create Nom Esp Alimentacion';
$this->params['breadcrumbs'][] = ['label' => 'Nom Esp Alimentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nom-esp-alimentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
