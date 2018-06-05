<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FactZonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zonas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
  <?php echo Dialog::widget(); ?>

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  fa-list-alt"></i>
      Maestro de Zonas
  </h3>
    <p>
        <?= Html::a('Registrar Zona', ['create'], ['class' => 'btn btn-success']) ?>
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
                                      Url::to(['fact-zonas/update','id'=>$model->id]), [
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
                              $url=Url::to(['fact-zonas/delete','id'=>$model->id]);
                              return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar la Zona:  ' +  '$model->ref', function (result) {
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
                      'attribute'=>'ref',
                      'label'=>'Referencia','value'=>function ($searchModel, $key, $index, $widget) {
                          return Html::a($searchModel->ref,
                              ['view','id'=>$searchModel->id],
                              ['title'=>'Ver Datos de la Zona' ]);
                      },
                        'format'=>'raw'
                  ],
            'denominacion',


        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
