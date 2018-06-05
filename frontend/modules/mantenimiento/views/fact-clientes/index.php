<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\dialog\Dialog;
use xj\bootbox\BootboxAsset;
use kartik\widgets\Alert;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

BootboxAsset::register($this);


/* @var $this yii\web\View */
/* @var $searchModel common\models\FactClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo Dialog::widget(); ?>

<div class="container">

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-list-alt"></i>
      Maestro de Clientes
  </h3>
    <p>
        <?= Html::a('Registrar Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="alert alert-success alert-s-ant" hidden="false" role="alert"> </div>
    <div class="alert alert-danger alert-d-ant" hidden="false" role="alert"> </div>

    <?php Pjax::begin(['id' => 'grid-clientes']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{update}',
                            'buttons' => [
                              'update' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-refresh bigger-120"></i></span> ',
                                      Url::to(['fact-clientes/update','id'=>$model->id]), [
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'Actualizar'),

                                  ]);
                              },




                            ],
              ],

              [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{cargar}',
                    'buttons' => [
                        'cargar' => function ($url, $model, $key) {
                          return  Html::a('<span class="btn btn-xs btn-info"><i class="ace-icon fa fa-desktop bigger-120"></i></span> ', '#', [
                                'id' => 'activity-index-link',
                                'title' => Yii::t('app', 'Facturar'),
                                'onclick' => "
                                krajeeDialog.confirm('Esta seguro de Facturar al Cliente:  ' +  '$model->razon', function (result) {
                                })",

                            ]);
                        },




                    ],
                ],


                [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{delete}',
                      'buttons' => [
                        'delete' => function ($url,$model, $key) {
                              $url=Url::to(['fact-clientes/delete','id'=>$model->id]);
                              return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar el Cliente:  ' +  '$model->razon', function (result) {
                                       if (result) {
                                          $.ajax({

                                          url: '$url',
                                          type: 'POST',

                                          error : function(xhr, status) {
                                            $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                          },
                                          success: function (json){
                                            $.pjax.reload({container: '#grid-clientes'});
                                            $('.alert-s-ant').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
                                          },

                                      });
                                    }
                                  });
                                      return false;
                                  ",
                              ]);
                          },

                          ],
                  ],


                  [
                      'attribute'=>'cedrif',
                      'label'=>'Cedula o Rif','value'=>function ($searchModel, $key, $index, $widget) {
                          return Html::a($searchModel->cedrif,
                              ['view','id'=>$searchModel->id],
                              ['title'=>'Ver Datos del Cliente' ]);
                      },
                        'format'=>'raw'
                  ],



            'razon',
            'direccion',
            'telefono',
            [
            'attribute'=>'id_zona',
            'label'=>'Zona',
            'value'=>function ($searchModel, $key, $index, $widget){
            return isset($searchModel->id_zona) ? $searchModel->idZona->denominacion: ' ';
            },
            'filter' => Html::activeDropDownList($searchModel,
            'id_zona', ArrayHelper::map(common\models\FactZonas::find()->orderBy(['denominacion' => SORT_DESC])->asArray()->all(),
            'id', 'denominacion'),['class'=>'form-control','prompt' => 'No Filtro']),
            'format'=>'raw'
           ],

            // 'fax',
            // 'email:email',


        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
