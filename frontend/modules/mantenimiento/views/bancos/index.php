<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BancosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bancos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <p>
        <?= Html::a('Crear Banco', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id' => 'grid-bancos']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
              [
              'attribute'=>'codigo',
              'label'=>'Código',


              'value'=>function ($searchModel, $key, $index, $widget) {
                  return Html::a($searchModel->codigo,
                      ['view','id'=>$searchModel->id],
                      ['title'=>'Ver Datos del Banco' ]);
              },

              'format'=>'raw'
          ],

            'ncuenta',
            'denominacion',

            [
              'attribute'=>'tipo',
              'value'=>function ($model, $key, $index, $widget) {
                    if ($model->tipo==0){
                          return 'Corriente';
                    } else {
                          return 'Ahorro';
                    }

              },
              'filter' => Html::activeDropDownList($searchModel,
              'tipo', ArrayHelper::map(common\models\Bancos::getTiposCuenta(),
              'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
              'format'=>'html',
          ],

            // 'direccion',
            // 'contacto',
            // 'telefonos',
            // 'fax',
            // 'email:email',
            // 'web_site',
            // 'codigo',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',

                 //--------- Actualizar ---
             'buttons' => [




               'update' => function ($url,$searchModel) {
                 return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                            ['bancos/update','id'=>$searchModel->id],

                            ['title'=>'Actualizar',
                            'class'=>'blue',
                           ]);
               },

               'delete' => function ($url, $model) {
                 return Html::a(Yii::t('app',''), ['bancos/delete', 'id' => $model->id], [
                     'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                     'data' => [
                         'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Banco: '.$model->codigo ),
                         'method' => 'post',
                     ],
                 ]);


               },



             ],
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
