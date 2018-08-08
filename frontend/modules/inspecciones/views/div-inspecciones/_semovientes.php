<?php
use common\models\DivSemovientes;
use common\models\DivSemovientesSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\DivSemovientes */



?>


<?php
$searchModel = new DivSemovientesSearch();
$searchModel->id_insp=$model->id;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 ?>



<?= GridView::widget([
  'dataProvider' => $dataProvider,
  'responsive'=>true,
  'hover'=>true,
  'pjax'=>true,
  'filterModel' => $searchModel,
  'pjax'=>true,

  'pjaxSettings'=>[
      'neverTimeout'=>true,
      'options'=>[
        'id'=>'grid-semovientes',
      ],
  ],
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="fa fa-intersex"></i> Registro de Semovientes</h3>',
        'type'=>'info',


        'footer'=>true
    ],
    'toolbar' => [
  [
      'content'=>
      Html::button('<i class="fa fa-plus"></i>',[
        'id' => 'activity-index-link',
        'class' => 'btn btn-success add',
        'data-toggle' => 'modal',
        'data-target' => '#modal-semovientes',
        'data-url' => Url::to(['div-semovientes/create','id_insp'=>$model->id]),
        'data-pjax' => '0',
      ]) . ' '.
          Html::a('<i class="ace-icon fa fa-file-pdf-o bigger-125"></i>', ['grid-demo'], [
              'class' => 'btn btn-info',
              'title' => 'Listado'
          ]),

  ],
  '{export}',
  '{toggleData}'
],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],


        [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{delete}',
              'buttons' => [
                'delete' => function ($url,$model, $key) {
                      $url=Url::to(['div-semovientes/delete','id'=>$model->id]);
                      return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                          'title' => Yii::t('yii', 'Delete'),
                          'aria-label' => Yii::t('yii', 'Delete'),
                          'onclick' => "
                          krajeeDialog.confirm('Esta seguro de eliminar el Bovino:  ' +  '$model->nbov', function (result) {
                               if (result) {
                                  $.ajax({

                                  url: '$url',
                                  type: 'POST',

                                  error : function(xhr, status) {
                                    $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                  },
                                  success: function (json){
                                    $.pjax.reload({container: '#grid-semovientes'});

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
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'nbov',

            'editableOptions'=>[
                'header'=>'Categoria',
                'asPopover' => false,
                'inputType'=>Editable :: INPUT_TEXT,


                //'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]],

            ],
            'hAlign'=>'left',
            'vAlign'=>'middle',
            'width'=>'400px',
          ],


        [
          'class'=>'kartik\grid\EditableColumn',
          'attribute'=>'sexo',

          'filter' => Html::activeDropDownList($searchModel,
          'sexo', ['H'=>'Hembras','M'=>'Machos'],['class'=>'form-control','prompt' => 'No Filtro']),
          'editableOptions'=>[
              'header'=>'Categoria',
              'asPopover' => false,
              'inputType'=>Editable :: INPUT_SELECT2,
              'options'=>[
                'data'=> ['H'=>'Hembras','M'=>'Machos']
              ],
              'displayValueConfig'=> ['H'=>'Hembras','M'=>'Machos'],


              //'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]],

          ],
          'hAlign'=>'left',
          'vAlign'=>'middle',
          'width'=>'300px',
          //'format'=>['decimal', 2],

      ],

        [
          'class'=>'kartik\grid\EditableColumn',
          'attribute'=>'categoria',
          'filter' => Html::activeDropDownList($searchModel,
          'sexo', ['0'=>'Vaca','1'=>'Toro','2'=>'Becerro(a)','3'=>'Maute(a)','4'=>'Novillo(a)'],['class'=>'form-control','prompt' => 'No Filtro']),
          'editableOptions'=>[
              'header'=>'Categoria',
              'asPopover' => false,
              'inputType'=>Editable :: INPUT_SELECT2,
              'options'=>[
                'data'=> ['0'=>'Vaca','1'=>'Toro','2'=>'Becerro(a)','3'=>'Maute(a)','4'=>'Novillo(a)']
              ],


                'displayValueConfig'=> ['0'=>'Vaca','1'=>'Toro','2'=>'Becerro(a)','3'=>'Maute(a)','4'=>'Novillo(a)'],

              //'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]],

          ],
          'hAlign'=>'left',
          'vAlign'=>'middle',
          'width'=>'200px',
          //'format'=>['decimal', 2],

      ],

      [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'is_auditado',

        'editableOptions'=>[
            'header'=>'Auditado',
            'asPopover' => false,
            'inputType'=>Editable :: INPUT_DROPDOWN_LIST,
            'data' => [0 => 'No', 1 => 'Si'],
            'options' => ['class'=>'form-control', 'prompt'=>'Select status...'],
            'displayValueConfig'=> [
                '1' => '<i class="ace-icon fa fa-check green bigger-160"></i>',
                '0' => '<i class="ace-icon fa fa-times red2 bigger-160"></i>'
            ],

        ],
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'200px',
      ],


    ],
]); ?>
