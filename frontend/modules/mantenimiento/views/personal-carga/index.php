<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PersonalCargaSearch */
/* @var $model common\models\Personal */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro Familiar de: ' ;
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo Dialog::widget(); ?>
<?php
      $this->registerJs(
          "$(document).on('click', '#open-modal', (function() {


              $.get(
                  $(this).data('url'),
                  function (data) {

                      $('.modal-body').html(data);
                      $('#modal').modal();
                  }
              );
          }));"
  ); ?>


    <?php
            $this->registerJs("
            $('.ajaxDelete').on('click', function(e) {
              alert('si');
e.preventDefault();
 var deleteUrl = $(this).attr('delete-url');
 var pjaxContainer = $(this).attr('pjax-container');

krajeeDialog.confirm('Esta seguro de Eliminar?', function (result) {
     if (result) {
        $.ajax({
                 beforeSend: function (xhr){

                 },
                url: deleteUrl,
                type: 'post',
                async: false,
               // dataType: 'json',
                error: function(xhr, status, error) {
                alert('There was an error with your request.' + xhr.responseText);
                }
        }).done(function(data) {
                        $('.alert').show();
                        $.pjax.reload({container: '#' + $.trim(pjaxContainer)});

        }).complete(function (data){

          $('.alert').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito');
          $('.alert').fadeOut(2000);
        });
    }});

    });



            ");

     ?>


<?php
      Modal::begin([
          'id' => 'modal',
          'header' => '<h3 class="header blue lighter smaller">
											<i class="ace-icon fa fa-users smaller-90"></i>
										   Familiar
										</h3>',


          'footer' => '<a href="#" class="btn btn-white btn-default btn-round" data-dismiss="modal">
												<i class="ace-icon fa fa-times red2"></i>
												Cancelar
											</a>',


      ]);

      echo "<div class='well'></div>";

      Modal::end();
?>


<div class="container">



    <p>
      <?= Html::a('Agregar Familiar', '#', [
          'id' => 'open-modal',
          'class' => 'btn btn-white btn-info btn-bold',
          'data-toggle' => 'modal',
          'data-target' => '#modal',
          'data-url' => Url::to(['personal-carga/create','id'=>$model->id]),
          'data-pjax' => '0',
      ]); ?>
    </p>
    <div  id="alert-fam" class="alert alert-success" hidden="false" role="alert"> </div>
    <?php Pjax::begin(['id' => 'grid-familia']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'ced',



                'value'=>function ($searchModel, $key, $index, $widget) {
                  return Html::a($searchModel->ced, '#', [
                      'id' => 'activity-index-link1',
                      'title' => Yii::t('app', 'Ver Datos del Familiar'),
                      'data-toggle' => 'modal',
                      'data-target' => '#modal1',
                      'data-url' => Url::to(['personal-carga/view', 'id' => $searchModel->id]),
                      'data-pjax' => '0',
                  ]);
                },

                'format'=>'raw'
            ],

            'nombres',
            'apellidos',
            'parentesco',

            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{update}{delete}',
              'buttons' => [
                  'update' => function ($url, $model, $key) {
                      return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                          'id' => 'open-modal',
                          'title' => Yii::t('app', 'Update'),
                          'data-toggle' => 'modal',
                          'data-target' => '#modal',
                          'data-url' => Url::to(['personal-carga/update', 'id' => $model->id]),
                          'data-pjax' => '0',
                      ]);
                  },


                  'delete' => function ($url,$model) {
                        $url=Url::to(['personal-carga/delete','id'=>$model->id]);
                        return Html::a(Yii::t('yii', 'Delete'), '#', [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'onclick' => "
                            krajeeDialog.confirm('Esta seguro de Eliminar?', function (result) {
                                 if (result) {
                                    $.ajax('$url', {
                                        type: 'POST'
                                    }).done(function(data) {
                                        $('.alert').show();
                                        $.pjax.reload({container: '#grid-familia'});
                                    }).complete(function (data){

                                      $('.alert').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito');
                                      $('.alert').fadeOut(2000);
                                    });
                                }
                            });
                                return false;
                            ",
                        ]);
                    },

                        //Html::a('<span class="ace-icon fa fa-trash-o bigger-120 red"></span>', false, ['class' => 'ajaxDelete', 'delete-url' => Url::to(['personal-carga/delete','id'=>$model->id]), 'pjax-container' => 'grid-familia', 'title' => Yii::t('app', 'Eliminar')]);
                        /*
                        Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                               'class' => '',
                               'data' => [
                                   'confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.',
                                   'method' => 'post',
                                   'pjax' => 0,
                               ],
                           ]);
                        */






              ]
          ],

        ],
    ]); ?>

    <?php Pjax::end() ?>


</div>
