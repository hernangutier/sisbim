<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use common\models\PersonalCargaSearch;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $model commmon\models\Personal */

?>
<?php echo Dialog::widget(); ?>











<div class="container">






					<div class="widget-body">
						<div class="widget-main">
							<?= Html::a('Agregar Familiar', '#', [
									'id' => 'activity-index-link',
									'class' => 'btn btn-white btn-info btn-bold',
									'data-toggle' => 'modal',
									'data-target' => '#modal',
									'data-url' => Url::to(['personal-carga/create','id'=>$model->id]),
									'data-pjax' => '0',
							]); ?>


						</div>
					</div>

          <?php
          $searchModel = new PersonalCargaSearch();
          $searchModel->id_int=$model->id;
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

					?>
          <div class="alert alert-success" hidden="false" role="alert"> </div>
          <div class="alert alert-danger" hidden="false" role="alert"> </div>

					<?php Pjax::begin(['id' => 'grid-familia']) ?>
					<?=
           GridView::widget([
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
                            'data-target' => '#modal',
                            'data-url' => Url::to(['personal-carga/view', 'id' => $searchModel->id]),
                            'data-pjax' => '0',
                        ]);
                      },

                      'format'=>'raw'
                  ],

                  'nombres',
                  'apellidos',

                  [
                    'attribute'=>'parentesco',
                    'value'=>function ($model, $key, $index, $widget) {

                            return $model->getParentesco();



                  },
                    'filter' => Html::activeDropDownList($searchModel,
                    'parentesco', ArrayHelper::map(common\models\PersonalCarga::getParentescos(),
                    'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                    'format'=>'raw',
                ],
                  // 'fnac',
                  // 'sexo',
                  // 'nivel_educ',

                  [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                            return Html::a('<span class="ace-icon fa fa-pencil bigger-120 blue"></span>', '#', [
                                'id' => 'activity-index-link',
                                'title' => Yii::t('app', 'Update'),
                                'data-toggle' => 'modal',
                                'data-target' => '#modal',
                                'data-url' => Url::to(['personal-carga/update', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },


                        'delete' => function ($url,$model) {
                              $url=Url::to(['personal-carga/delete','id'=>$model->id]);
                              return Html::a('<span class="ace-icon fa fa-trash-o bigger-120 red"></span>', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de Eliminar el Familiar: ' + '$model->nombres' + ' ' + '$model->apellidos', function (result) {
                                       if (result) {
                                          $.ajax({

                                          url: '$url',
                                          type: 'POST',

                                          error : function(xhr, status) {
                                            $('.alert-danger').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                          },
                                          success: function (json){
                                            $.pjax.reload({container: '#grid-antiguedad'});
                                            $('.alert-success').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
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
