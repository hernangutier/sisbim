<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\UnidadesAdmin;
use common\models\CalculosGenericos;
use yii\helpers\ArrayHelper;
use common\models\PersonalAntiguedadSearch;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\web\View;
use kartik\widgets\Alert;






//frontend\assets\GeneralAsset::register($this);

/* @var $this yii\web\View */
/* @var $model commmon\models\Personal */

?>
















<div class="container">






					<div class="widget-body">
						<div class="widget-main">
              <?= Html::button('Agregar Antiguedad',['value'=>Url::to('index.php?r=mantenimiento/personal-antiguedad/create&'.'id=' . $model->id),'class'=>'btn btn-white btn-info btn-bold', 'id'=>'btn-antiguedad'])  ?>
            </div>
					</div>

          <?php
          $searchModel = new PersonalAntiguedadSearch();
					$searchModel->id_int=$model->id;
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

					?>

          <div class="alert alert-success alert-s-ant" hidden="false" role="alert"> </div>
          <div class="alert alert-danger alert-d-ant" hidden="false" role="alert"> </div>


          <?php Pjax::begin(['id' => 'grid-antiguedad']) ?>
					<?=
           GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,

              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],




                  'procedencia',
                  'anos',
                  'meses',
                  'dias',


                  [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                          $url=Url::to(['personal-antiguedad/update','id'=>$model->id]);
                          return Html::a('<span class="ace-icon fa fa-pencil bigger-120 blue"></span>', '#', [
                              'title' => Yii::t('yii', 'Update'),

                              'onclick' => "

                              $('#modal').modal('show')

                              .find('.modal-body')
                              .load('$url');

                              ",

                          ]);



                        },
                        'delete' => function ($url,$model) {
                              $url=Url::to(['personal-antiguedad/delete','id'=>$model->id]);
                              return Html::a('<span class="ace-icon fa fa-trash-o bigger-120 red"></span>', '#', [
                                  'title' => Yii::t('yii', 'Delete'),
                                  'aria-label' => Yii::t('yii', 'Delete'),
                                  'onclick' => "
                                  krajeeDialog.confirm('Esta seguro de eliminar la antiguedad de:  ' +  '$model->procedencia', function (result) {
                                       if (result) {
                                          $.ajax({

                                          url: '$url',
                                          type: 'POST',

                                          error : function(xhr, status) {
                                            $('.alert-d-ant').html('<strong>Error!</strong> El Registro no se pudo eliminar').show().fadeOut(2000);
                                          },
                                          success: function (json){
                                            $.pjax.reload({container: '#grid-antiguedad'});
                                            $('.alert-s-ant').html('<strong>Felicitaciones!</strong> El Registro a sido Eliminado con Exito').show().fadeOut(2000);
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

          <div class="row">
            <table class="table table-striped table-bordered">


                          <tbody>
                            <tr>



                              <td class="hidden-xs">
                                Antiguedad acarreada:
                              </td>

                              <td><?= CalculosGenericos::getAntAcarreada($model->id)['anos'] ?> años</td>
                              <td><?= CalculosGenericos::getAntAcarreada($model->id)['meses'] ?> meses</td>
                              <td><?= CalculosGenericos::getAntAcarreada($model->id)['dias'] ?> dias</td>
                            </tr>

                            <tr>



                              <td class="hidden-xs">
                                Antiguedad en la Institucion:
                              </td>

                              <td><?= CalculosGenericos::getAntInstitucion($model->fin)['anos'] ?> años</td>
                              <td><?= CalculosGenericos::getAntInstitucion($model->fin)['meses'] ?> meses</td>
                              <td><?= CalculosGenericos::getAntInstitucion($model->fin)['dias'] ?> dias</td>
                            </tr>

                            <tr>



                              <td class="hidden-xs">
                                <h4 class="pull-right">
																Total Antiguedad
                              </h4>
                              </td>

                              <td><h4><span class="red"><?= CalculosGenericos::getAntTotal($model->id)['anos'] ?> años</span></h4></td>
                              <td><h4><span class="red"><?= CalculosGenericos::getAntTotal($model->id)['meses'] ?> meses</span></h4></td>
                              <td><h4><span class="red"><?= CalculosGenericos::getAntTotal($model->id)['dias'] ?> dias</span></h4></td>
                            </tr>


                          </tbody>
                        </table>

          </div>
<?php Pjax::end() ?>
				</div>
