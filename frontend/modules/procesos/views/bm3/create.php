<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bm3 */

$this->title = 'Create Bm3';
$this->params['breadcrumbs'][] = ['label' => 'Bm3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bm3-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
