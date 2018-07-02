<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\dialog\Dialog;
use yii\bootstrap\Modal;
//use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IncOrdenesComprasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro de Inspecciones';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
Modal::begin([
    'id' => 'modal-ordenes-null',
    'header' => '<h4 class="blue bigger tl">Anular Orden de Compra</h4>',

]);

echo "<div class='well'></div>";

Modal::end();
?>

<div class="container">


  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Registro de Inspecciones
  </h3>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'options'=>[
              'id'=>'grid-inspecciones',
            ],
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{admin}',
                            'buttons' => [
                              'admin' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-wrench bigger-120"></i></span> ',
                                      Url::to(['div-inspecciones/view','id'=>$model->id]), [
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'Administrar'),

                                  ]);
                              },
                      ],
              ],
              [
                              'class' => 'yii\grid\ActionColumn',
                              'template' => '{print}',
                              'buttons' => [
                                'print' => function ($url, $model, $key) {

                                },
                        ],
                ],
                [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{nulls}',
                                'buttons' => [

                                  'nulls' => function ($url, $model, $key) {
                                    $url=Url::to(['inc-ordenes-compras/nulls','id'=>$model->id]);
                                    return

                                    ($model->status==0) ?
                                    Html::a('<span class="btn btn-xs btn-danger open"><i class="ace-icon fa fa-ban bigger-120"></i></span>', '#', [
                                        'title' => Yii::t('yii', 'Anular Orden de Compra'),

                                        'onclick' => "

                                        $('#modal-ordenes-null').modal('show')

                                        .find('.modal-body')
                                        .load('$url');

                                        ",

                                    ]) : '';



                                  },

                          ],
                  ],



            [
              'attribute'=>'ncontrol',
              'value'=>function ($searchModel){
                return '<span class="badge badge-info"><b/>' . $searchModel->ncontrol . '</span>';
              },
              'format'=>'raw',

            ],
            'f_ini',
            [
              'attribute'=>'id',
              'label'=>'Descripcion',
              'value'=>function ($searchModel){
                return $searchModel->descripcion;
              }
            ],






            [
              'attribute'=>'status',
              'value'=>function ($searchModel){
                return $searchModel->getStatusHtml();
              },
              'format'=>'raw',

            ],
            // 'id_user',
            // 'ncontrol',
            // 'tipo',
            // 'status',
            // 'periodo',
            // 'ano',
            // 'fecha_process',
            // 'fecha_creation',


        ],
    ]); ?>
</div>
