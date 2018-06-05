<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use common\models\ProvProntoPago;
use common\models\ProvProntoPagoSearch;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\Proveedores */
/* @var $items common\models\ProvProntoPago */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-3">
        <div class="widget-box transparent">
          <div class="widget-header widget-header-small">
            <h4 class="widget-title smaller">
              <i class="ace-icon fa fa-newspaper-o bigger-110"></i>
                                     Agregar Criterio
            </h4>
          </div>


          <?= $form->field($items, 'lim_inf')->textInput() ?>



          <?= $form->field($items, 'percent')->textInput() ?>


          <hr>
          <div class="form-group">
              <?= Html::submitButton($items->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          </div>
        </div>
        </div>
        <div class="col-sm-9">
            <!---  Renderizamos el Grid de Datos del DDetalle    -->
            <div class="widget-box transparent">
              <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller">
                  <i class="ace-icon fa fa-newspaper-o bigger-110"></i>
                                         Criterios de Pronto Pago
                </h4>
              </div>



            <?php

            /*
            $query = ProvProntoPago::find(['id_prov'=>$model->id]); // where `id` is your primary key

            $dataProvider = new ActiveDataProvider([
                  'query' => $query,
            ]);
            */


            $searchModel = new ProvProntoPagoSearch();
            $searchModel->id_prov=$model->id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            echo Yii::$app->controller->renderPartial('_pronto_pago_index',['dataProvider'=>$dataProvider]);
             ?>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>
