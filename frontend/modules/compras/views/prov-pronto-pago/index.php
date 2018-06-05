<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProvProntoPagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="prov-pronto-pago-index">




    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'lim_inf',

            'percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
