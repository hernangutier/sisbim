<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use kartik\widgets\Select2;
use yii\bootstrap\Modal;
use yii\web\Response;
use yii\helpers\Url;
use yii\web\View;
use yii\web\JsExpression;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
$url =Url::to(['articulos-list']);

/* @var $this yii\web\View */
/* @var $model common\models\ProvCompras */
/* @var $dt common\models\ProvComprasDt */

 ?>

<?php
$this->title = 'Nueva Compra ';

//--------------- Script para la Consulta de los Articulos ----
$formatJs = <<< 'JS'
var formatRepo = function (city) {
  if (city.loading) {
      return city.descripcion;
  }
  var markup =
'<div class="row">' +
  '<div class="col-sm-3">' +
    '<h4><b/>' + city.ref + '</h4>' +
  '</div>' +
  '<div class="col-sm-6">' +

      '<h4><b style="margin-left:5px">' + city.descripcion + '</b></h4>' +
  '</div>' +

  '<div class="col-sm-3">' +

      '<h4><b style="margin-left:5px">' + city.existencias + '</b></h4>' +
  '</div>' +

'</div>';

  return '<div style="overflow:hidden;">' + markup + '</div>';
};
JS;

$this->registerJs($formatJs, View::POS_HEAD);

 ?>


<?php
//---------------   Script me controla la Tabla -------

$this->registerJsFile(
    '@web/js/compras.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<?php
Modal::begin([
    'id' => 'md-compras',
    'header' => '<h4 class="blue bigger tl">Nuevo Articulo</h4>',
    'footer' => '<div class="modal-footer">
      <button class="btn btn-sm" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Cancelar
      </button>

      <button  class="btn btn-white btn-success btn-bold pull-right" type="submit">
      <i class="ace-icon fa fa-floppy-o bigger-120 green "></i>
        Guardar
      </button>
    </div>',
]);

echo "<div class='well'></div>";

Modal::end();
?>




 <!--   Interfaz grafica Html -->
 <div class="widget-box transparent">
					<div class="widget-header widget-header-large">

                        <h3 class="widget-title grey lighter">
													<i class="ace-icon fa fa-shopping-cart green"></i>
													Nueva Compra
												</h3>
                        <div class="widget-toolbar no-border invoice-info">
                          <span class="invoice-info-label">N° de Control:</span>
                          <span class="red">0001</span>

                          <br>
                          <span class="invoice-info-label">Fecha:</span>
                          <span class="blue">04/04/2014</span>
                        </div>
         </div>
         <div class="row">
            <div class="col-sm-3">
              <?php
                  echo Yii::$app->controller->renderPartial('create',['model'=>$model]);
               ?>
       </div>

       <div class="col-sm-9">

<div class="row">


         <div class="widget-box">
   												<div class="widget-header">
   													<h4 class="widget-title">Buscar Articulos</h4>

   													<span class="widget-toolbar">
   														<a href="#" data-action="settings">
   															<i class="ace-icon fa fa-cog"></i>
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
   													</span>
   												</div>

   												<div class="widget-body">
   													<div class="widget-main">


                               <div class="row">
                               <div class="col-xs-12 col-sm-12 ">


                                 <?=


                                 Select2::widget([
                                     'model' => $dt,
                                     'attribute' => 'id_art',
                                     'size' => Select2::LARGE,
                                     //'initValueText' => 'kartik-v/yii2-widgets',
                                     'options' => ['placeholder' => 'Buscar Articulos'],

                                     'addon' => [



                                         'append' => [
                                           'content' => Html::button('<i class="fa fa-plus"></i>',[
                                             'id' => 'activity-index-link',
                                             'class' => 'btn btn-success',
                                             'data-toggle' => 'modal',
                                             'data-target' => '#modal',
                                             'data-url' => Url::to(['prov-articulos/modal']),
                                             'data-pjax' => '0',
                                           ]),
                                             'asButton' => true
                                         ]
                                     ],
                                     'pluginOptions' => [
                                         'allowClear' => true,
                                         'minimumInputLength' => 1,
                                         'ajax' => [
                                             'url' => $url,
                                             'dataType' => 'json',
                                             'delay' => 250,
                                             'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),

                                         ],
                                         'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                        'templateResult' => new JsExpression('formatRepo'),
                                        'templateSelection' => new JsExpression('function (city) { return city.ref + " " + city.descripcion; }'),
                                     ],

                                     'pluginEvents' => [

                                         "select2:select" => "function() {
                                           $('.detalle').show();
                                           itemSelected=$(this).val();
                                         }",

                                         "select2:unselect" => "function() {itemSelected=null;
                                           $('.detalle').hide();
                                         }"
                                     ],


                                 ]);




                                 ?>

                                 </div>
                               </div>



                               <hr>
                               <div class="row">

                                 <div class="detalle">


                                 <?php $form = ActiveForm::begin([
                                     'id' => 'compra-dt-form',

                                 ]); ?>

                                 <div class="profile-user-info profile-user-info-striped">




                                                         <div class="profile-info-row">
                                 													<div class="profile-info-name"> Cantidad Pedida </div>

                                 													<div class="profile-info-value">
                                 														        <?= $form->field($dt, 'cnt_pedida')->textInput()->label(false) ?>
                                 													</div>
                                 												</div>

                                                         <div class="profile-info-row">
                                 													<div class="profile-info-name"> Cantidad Recibida </div>

                                 													<div class="profile-info-value">
                                 														        <?= $form->field($dt, 'cnt')->textInput()->label(false) ?>
                                 													</div>
                                 												</div>







                                 											</div>




                                    <?php ActiveForm::end(); ?>


                                      <div class="form-actions center">
                                          <button type="button" class="btn btn-sm btn-success add">
                                                            Agregar
                                                    <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                          </button>
                                      </div>




                                 </div>


                               </div>






   													</div>
   												</div>
   											</div>


                </div>


                <div class="row">

                  <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" style="min-height: 212.133px;">
                           <div class="widget-box widget-color-blue2">
                                    <div class="widget-header">
                                      <h5 class="widget-title bigger lighter">
         													<i class="ace-icon fa fa-table"></i>
         													<b>Items de la Compra</b>
         												</h5>


                                      <div class="widget-toolbar">
                													<a href="#" data-action="collapse">
                														<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
                													</a>



                												</div>

                                        <div class="widget-toolbar ">
                                        <div class="widget-menu">
                                         <div class="col-sm-12">

                                         </div>

                                         <div class="widget-toolbar ">
                                         <div class="widget-menu">
                                          <div class="col-sm-12">

                                         </div>
                                         </div>
                                         </div>










                                        </div>
                                        </div>


                           </div>

         											<div class="widget-body">
         												<div class="widget-main no-padding">
         													<table id="tbl" class="table table-striped table-bordered table-hover">
         														<thead class="thin-border-bottom">
         															<tr>


                                        <th class="center">
                                             Items
         																</th>

                                        <th class="id_art"></th>

                                         <th>

         																	Referencia
         																</th>

         																<th>

         																	Descripcion
         																</th>

                                         <th>Cantidad Pedida</th>

                                         <th>Cantidad Recibida</th>

                                         <th>Acciones</th>

         															</tr>
         														</thead>

         														<tbody>

         														</tbody>
         													</table>
         												</div>
         											</div>
         										</div>
                </div>

                </div>


            </div>
         </div>

      <!--- Formulario para los Detalles -->


<!-- Fin del Html -->
