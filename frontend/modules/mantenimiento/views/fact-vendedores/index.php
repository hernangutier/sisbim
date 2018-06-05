<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FactVendedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
  <?php echo Dialog::widget(); ?>

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-list-alt"></i>
      Maestro de Vendedores
  </h3>
    <p>
        <?= Html::a('Registrar Vendedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="alert alert-success alert-s-ant" hidden="false" role="alert"> </div>
    <div class="alert alert-danger alert-d-ant" hidden="false" role="alert"> </div>

    <?php Pjax::begin(['id' => 'grid-zonas']) ?>

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
                                      Url::to(['fact-vendedores/update','id'=>$model->id]), [
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'Actualizar'),

                                  ]);
                              },




                            ],
              ],




                [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{delete}',
                      'buttons' => [
                        'delete' => function ($url,$model, $key) {
                              $url=Url::to(['fact-vendedores/delete','id'=>$model->id]);
                              return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar el Vendedor:  ' +  '$model->cedrif', function (result) {
                                       if (result) {
                                          $.ajax({

                                          url: '$url',
                                          type: 'POST',

                                          error : function(xhr, status) {
                                            $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                          },
                                          success: function (json){
                                            $.pjax.reload({container: '#grid-zonas'});
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
                      'label'=>'Cedula','value'=>function ($searchModel, $key, $index, $widget) {
                          return Html::a($searchModel->cedrif,
                              ['view','id'=>$searchModel->cedrif],
                              ['title'=>'Ver Datos del Vendedor' ]);
                      },
                        'format'=>'raw'
                  ],
            'nombre',
            'direccion',
            'telefono',


        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
