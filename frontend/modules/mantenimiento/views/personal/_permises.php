<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\dialog\Dialog;
use common\models\UnidadesAdmin;
use yii\helpers\ArrayHelper;
use common\models\PersonalPermisosSearch;
use common\models\PersonalPermisos;
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
              <?= Html::button('Agregar Suspención',['value'=>Url::to('index.php?r=mantenimiento/personal-permisos/create&'.'id=' . $model->id),'class'=>'btn btn-white btn-info btn-bold', 'id'=>'btn-permiso'])  ?>
            </div>
					</div>

          <?php
          $searchModel = new PersonalPermisosSearch();
					$searchModel->id_int=$model->id;
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

					?>
					<?php Pjax::begin(['id' => 'grid-permises']); ?>
					<?=
           GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'rowOptions' => function ($model, $index, $widget, $grid){

                  if($model->status == 0){
                        return ['class' => 'success'];
                  }
                  if($model->status == 1){
                        return ['class' => 'warning'];
                  } else {
                        return ['class' => 'danger'];
                  }

              },

              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],
                  [
                  'attribute'=>'fini',
                  'label'=>'Fecha de Inicio',


                  'value'=>function ($searchModel, $key, $index, $widget) {
                      return Html::a($searchModel->fini,
                          ['view','id'=>$searchModel->id],
                          ['title'=>'Ver Datos de la Suspención' ]);
                  },

                  'format'=>'raw'
                  ],

                  'fend',
                  [
                  'attribute'=>'tipo',
                  'value'=>function ($searchModel, $key, $index, $widget) {
                      return $searchModel->getTipo();

                  },

                  'filter' => Html::activeDropDownList($searchModel,
                        'tipo', ArrayHelper::map(PersonalPermisos::getTiposList(),
                        'id', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                        'format'=>'raw',
                  ],
                  'motivo'



              ],
          ]);


           ?>
					<?php Pjax::end() ?>





				</div>
