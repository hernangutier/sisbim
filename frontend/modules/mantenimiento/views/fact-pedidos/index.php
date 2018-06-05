<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FactPedidosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion de Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Pedidos en Linea
  </h3>


<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{admin}',
                            'buttons' => [
                              'admin' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-refresh bigger-120"></i></span> ',
                                      Url::to(['fact-cxp/register','id'=>$model->id]), [
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'Administrar'),

                                  ]);
                              },




                            ],
              ],

            'ref',
            [
            'attribute'=>'id_client',
            'label'=>'Cliente',
            'value'=>function ($searchModel, $key, $index, $widget){
                return isset($searchModel->idClient) ? $searchModel->idClient->razon: ' ';
            },
            'filter' => Html::activeDropDownList($searchModel,
            'id_client', ArrayHelper::map(common\models\FactClientes::find()->orderBy(['razon' => SORT_DESC])->asArray()->all(),
            'id', 'razon'),['class'=>'form-control','prompt' => 'No Filtro']),
            'format'=>'raw'
           ],


           [
           'attribute'=>'id_vend',
           'label'=>'Vendedor',
           'value'=>function ($searchModel, $key, $index, $widget){
               return isset($searchModel->idVend) ? $searchModel->idVend->nombre: ' ';
           },
           'filter' => Html::activeDropDownList($searchModel,
           'id_vend', ArrayHelper::map(common\models\FactVendedores::find()->orderBy(['nombre' => SORT_DESC])->asArray()->all(),
           'id', 'nombre'),['class'=>'form-control','prompt' => 'No Filtro']),
           'format'=>'raw'
          ],

            'date_creation',

            [
          'attribute'=>'status',
          'label'=>'Estatus',


          'value'=>function ($searchModel, $key, $index, $widget) {
              return $searchModel->getStatusHtml();
          },

          'format'=>'raw'
      ],

            // 'id_user',

            
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
