<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\dialog\Dialog;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use common\models\PersonalExpSearch;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

//frontend\assets\GeneralAsset::register($this);

/* @var $this yii\web\View */
/* @var $model commmon\models\Personal */

?>











<div class="container">






					<div class="widget-body">
						<div class="widget-main">
              <?= Html::button('Agregar Archivo',['value'=>Url::to('index.php?r=mantenimiento/personal-exp/create&'.'id=' . $model->id),'class'=>'btn btn-white btn-info btn-bold folio'])  ?>
            </div>
					</div>

          <?php
          $searchModel = new PersonalExpSearch();
					$searchModel->id_int=$model->id;
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

					?>

          <div class="alert alert-success" id="alert-s-folio" hidden="false" role="alert"> </div>
          <div class="alert alert-danger" id="alert-d-folio" hidden="false" role="alert"> </div>

          <?php Pjax::begin(['id' => 'grid-folio-id']) ?>


					<?=
           GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,

              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],




                  'folio',
                  'descripcion',
                  [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [



                        'delete' => function ($url,$model) {
                              $url=Url::to(['personal-exp/delete','id'=>$model->id]);
                              return Html::a('<span class="ace-icon fa fa-trash-o bigger-120 red"></span>', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar el folio N°: ' + '$model->folio' , function (result) {
                                       if (result) {
                                          $.ajax({

                                          url: '$url',
                                          type: 'POST',

                                          error : function(xhr, status) {
                                            $('#alert-d-folio').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                          },
                                          success: function (json){
                                            $.pjax.reload({container: '#grid-folio-id'});
                                            $('#alert-s-folio').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
                                          },

                                      });
                                    }
                                  });
                                      return false;
                                  ",
                              ]);
                          },

                    ]
                ],


              ],
          ]);


           ?>
					<?php Pjax::end() ?>





				</div>
