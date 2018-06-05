<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProvArtLineasSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lineas de Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



<div class="row">
  <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" style="min-height: 212.133px;">
                  <div class="widget-box widget-color-blue2">
                    <div class="widget-header">
                      <h5 class="widget-title"> <b>Lineas de Atticulos</b></h5>

                      <div class="widget-toolbar">
                        <div class="widget-menu">
                          <a href="<?= Url::to(['prov-art-lineas/create']) ?>" >
                            <i class="ace-icon fa fa-plus"></i>
                          </a>


                        </div>



                        <a href="#" data-action="fullscreen" class="orange2">
                          <i class="ace-icon fa fa-expand"></i>
                        </a>

                        <a href="#" data-action="reload">
                          <i class="ace-icon fa fa-refresh"></i>
                        </a>

                        <a href="#" data-action="collapse">
                          <i class="ace-icon fa fa-chevron-up"></i>
                        </a>

                        <a href="#" data-action="close">
                          <i class="ace-icon fa fa-times"></i>
                        </a>
                      </div>
                    </div>

                    <div class="widget-body">
                      <div class="widget-main">
                        <?php Pjax::begin(); ?>
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
                                                          Url::to(['prov-art-lineas/update','id'=>$model->id]), [
                                                          'id' => 'activity-index-link',
                                                          'title' => Yii::t('app', 'Actualizar'),

                                                      ]);
                                                  },




                                                ],
                                  ],

                                [
                                'attribute'=>'descripcion',
                                'label'=>'Descripcion',

                                'value'=>function ($searchModel, $key, $index, $widget) {
                                    return Html::a($searchModel->descripcion,
                                        ['view-resumen','id'=>$searchModel->id],
                                        ['title'=>'Ver Datos de la Linea' ]);
                                },

                                'format'=>'raw'
                                ],










                            ],
                        ]); ?>
                        <?php Pjax::end(); ?>

                      </div>
                    </div>
                  </div>
                </div>
</div>



</div>
