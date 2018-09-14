<?php
use common\models\DivBienes;
use common\models\DivBienesSearch;
use kartik\grid\GridView;
use kartik\helpers\Enum;
use yii\widgets\Pjax;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\DivBienes */



?>


<?php
$searchModel = new DivBienesSearch();
$searchModel->id_insp=$model->id;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 ?>



<?= GridView::widget([
  'dataProvider' => $dataProvider,
  'responsive'=>true,
  'hover'=>true,
  'filterModel' => $searchModel,
  'pjax'=>true,
  'pjaxSettings'=>[
      'neverTimeout'=>false,
      'options'=>[
        'id'=>'grid-bienes',
      ],
  ],
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="fa fa-intersex"></i> Registro de Bienes Muebles</h3>',
        'type'=>'info',


        'footer'=>true
    ],
    'toolbar' => [
  [
      'content'=>
      Html::button('<i class="fa fa-plus"></i>',[
        'id' => 'activity-bien',
        'class' => 'btn btn-success add',
        'data-toggle' => 'modal',
        'data-target' => '#modal-semovientes',
        'data-url' => Url::to(['div-bienes/create','id_insp'=>$model->id]),
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
                      $url=Url::to(['div-bienes/delete','id'=>$model->id]);
                      return Html::a('<span class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></span> ', '#', [
                          'title' => Yii::t('yii', 'Delete'),
                          'aria-label' => Yii::t('yii', 'Delete'),
                          'onclick' => "
                          krajeeDialog.confirm('Esta seguro de eliminar el Bien:  ' +  '$model->descripcion', function (result) {
                               if (result) {
                                  $.ajax({

                                  url: '$url',
                                  type: 'POST',

                                  error : function(xhr, status) {
                                    $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                  },
                                  success: function (json){
                                    $.pjax.reload({container: '#grid-bienes'});

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
            'attribute'=>'ref',

            'editableOptions'=>[
                'header'=>'Referencia',
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
            'attribute'=>'descripcion',

            'editableOptions'=>[
                'header'=>'Decsripción',
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
          'attribute'=>'tipo',

          'filter' => Html::activeDropDownList($searchModel,
          'tipo', ['0'=>'Vehiculo','1'=>'Maquinaria','2'=>'Implemento','3'=>'Bien Mueble en Comun'],['class'=>'form-control','prompt' => 'No Filtro']),
          'editableOptions'=>[
              'header'=>'Tipo',
              'asPopover' => false,
              'inputType'=>Editable :: INPUT_SELECT2,
              'options'=>[
                'data'=> ['0'=>'Vehiculo','1'=>'Maquinaria','2'=>'Implemento','3'=>'Bien Mueble en Comun']
              ],
              'displayValueConfig'=> ['0'=>'Vehiculo','1'=>'Maquinaria','2'=>'Implemento','3'=>'Bien Mueble en Comun'],


              //'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]],

          ],
          'hAlign'=>'left',
          'vAlign'=>'middle',
          'width'=>'300px',
          //'format'=>['decimal', 2],

      ],



      [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'is_operativo',
        'filter' => Html::activeDropDownList($searchModel,
        'is_operativo', Enum::boolList('No', 'Si') ,
        ['class'=>'form-control','prompt' => 'No Filtro']),
        'editableOptions'=>[
            'header'=>'Operativo',
            'asPopover' => false,
            'inputType'=>Editable :: INPUT_DROPDOWN_LIST,
            'data' => [0 => 'No', 1 => 'Si'],
            'options' => ['class'=>'form-control', 'prompt'=>'Selecionar...'],
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
