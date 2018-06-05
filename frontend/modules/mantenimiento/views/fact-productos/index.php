<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\dialog\Dialog;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FactProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consulta Inventario';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo Dialog::widget(); ?>

<?php
    //----------- Rgistramos los scripts de apertura de formularios
    $this->registerJs("
      //------------- Familiares --------------------
      jQuery(document).ready(function($){

          //--------   Ver Datos del Familiar ---------
          $(document).on('click', '#activity-index-link1', (function() {
              $('#modal .header ').text('Costos y Precios');
              $.get(
                  $(this).data('url'),
                  function (data) {
                      $('.modal-body').html(data);
                      $('#modal').modal();
                  }
              );
          }));


      });

    ");
 ?>




<?php
//----------- Formulario Modal Unico Universal ----
      Modal::begin([
          'id' => 'modal',
          'header' => '<h3 class="header blue lighter smaller">
                     <i class="ace-icon fa fa-users smaller-90"></i>
                      Form
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

  <h3 class="header smaller lighter blue">
    <i class="ace-icon fa  	fa-comments "></i>
      Consultar Inventario
  </h3>




<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{price}',
                            'buttons' => [
                              'price' => function ($url, $model, $key) {
                                  return Html::a('<span class="btn btn-xs btn-primary"><i class="ace-icon fa fa-money bigger-120"></i></span> ',
                                      '#', [
                                      'id' => 'activity-index-link1',
                                      'data-url'=>Url::to(['fact-productos/precios', 'id' => $model->id_precio]),
                                      'title' => Yii::t('app', 'Ver Costos y Precios de: ' . $model->descripcion),

                                  ]);
                              },




                            ],
              ],



              [
                  'attribute'=>'ref',
                  'label'=>'Referencia','value'=>function ($searchModel, $key, $index, $widget) {
                      return Html::a($searchModel->ref,
                          ['view','id'=>$searchModel->id],
                          ['title'=>'Ver Datos del Producto' ]);
                  },
                    'format'=>'raw'
              ],
            'descripcion',

            [
            'attribute'=>'id_lin',
            'label'=>'Linea',
            'value'=>function ($searchModel, $key, $index, $widget){
                return isset($searchModel->idLin) ? $searchModel->idLin->denominacion: ' ';
            },
            'filter' => Html::activeDropDownList($searchModel,
            'id_lin', ArrayHelper::map(common\models\FactLineas::find()->orderBy(['denominacion' => SORT_DESC])->asArray()->all(),
            'id', 'denominacion'),['class'=>'form-control','prompt' => 'No Filtro']),
            'format'=>'raw'
           ],

           [
           'attribute'=>'id_marca',
           'label'=>'Marcas o Fabricantes',
           'value'=>function ($searchModel, $key, $index, $widget){
               return isset($searchModel->idMarca) ? $searchModel->idMarca->denominacion: ' ';
           },
           'filter' => Html::activeDropDownList($searchModel,
           'id_marca', ArrayHelper::map(common\models\FactMarcas::find()->orderBy(['denominacion' => SORT_DESC])->asArray()->all(),
           'id', 'denominacion'),['class'=>'form-control','prompt' => 'No Filtro']),
           'format'=>'raw'
          ],

            [
                'attribute'=>'id',
                'label'=>'Existencias','value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->getExist(),
                        ['view','id'=>$searchModel->id],
                        ['title'=>'Ver Datos del Producto' ]);
                },
                  'format'=>'raw'
            ],







        ],
    ]); ?>
<?php Pjax::end(); ?></div>
