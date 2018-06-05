<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FactCxpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentas X Pagar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Cuentas X Pagar o Facturas de Compras
  </h3>

    <p>
        <?= Html::a('Registrar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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

            'ncontrol',
            [
            'attribute'=>'id_prov',
            'label'=>'Proveedor',
            'value'=>function ($searchModel, $key, $index, $widget){
                return isset($searchModel->idProv) ? $searchModel->idProv->razon: ' ';
            },
            'filter' => Html::activeDropDownList($searchModel,
            'id_prov', ArrayHelper::map(common\models\FactProveedores::find()->orderBy(['razon' => SORT_DESC])->asArray()->all(),
            'id', 'razon'),['class'=>'form-control','prompt' => 'No Filtro']),
            'format'=>'raw'
           ],
            'date_creation',
            'date_factura',
            // 'id_user',
            [
          'attribute'=>'status',
          'label'=>'Estatus',


          'value'=>function ($searchModel, $key, $index, $widget) {
              return $searchModel->getStatusHtml();
          },

          'format'=>'raw'
      ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
