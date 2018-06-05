<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RefTipoDocumentosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Referencia Tipo de Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


    <p>
        <?= Html::a('Crear Tipo Documento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'denominacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
