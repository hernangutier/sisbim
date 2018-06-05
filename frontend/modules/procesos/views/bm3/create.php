<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bm3 */

$this->title = 'Registrar BM3';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-offset-3 col-sm-6">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
