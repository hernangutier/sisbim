<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;
use kartik\widgets\SwitchInput;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\ProvArtLineas;

/* @var $this yii\web\View */
/* @var $model app\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>

<?= ($model->isNewRecord) ? '<div class="widget-box widget-color-green vui-sortable-handle">' : '<div class="widget-box widget-color-blue2 vui-sortable-handle">' ?>
											<div class="widget-header widget-header-small">
												<h5 class="widget-title smaller"><?= ($model->isNewRecord) ? 'Nuevo Articulo' : 'Actualizar Articulo N°: ' . $model->ref ?></h5>


											</div>

											<div class="widget-body">
												<div class="widget-main padding-6">

                          <?= $form->field($model, 'ref', [

                            'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-barcode"></i>']]
                              ])?>

                          <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

                          <?php //-------------- Cargo -------------

                            echo $form->field($model, 'id_lin')->widget(Select2::classname(), [

                                 'data' => ArrayHelper::map(common\models\ProvArtLineas::find()->asArray()->all(),'id','descripcion'),
                                 'language' => 'es',
                                 'size' => Select2::SMALL,
                                 'options' => ['placeholder' => 'Seleccione la Linea'],
                                 'pluginOptions' => [
                                 'allowClear' => true
                                 ],
                               ]);

                         ?>

                         <div class="row">

                           <div class="col-sm-4">
                             <?= $form->field($model, 'und_empaque', [
                               'addon' => ['prepend' => ['content'=>'1/N']]
                             ])?>
                           </div>

                           <div class="col-sm-4">
                             <?= $form->field($model, 'und_mayor', [
                               'addon' => ['prepend' => ['content'=>'UND (+)']]
                             ])?>
                           </div>

                           <div class="col-sm-4">
                             <?= $form->field($model, 'und_menor', [
                               'addon' => ['prepend' => ['content'=>'UND (-)']]
                             ])?>
                           </div>

                         </div>


												</div>

                        <div class="widget-toolbox padding-8 clearfix">
                          <div class="form-group">
                              <?= Html::submitButton( ($model->isNewRecord) ? '<i class="ace-icon fa fa-floppy-o bigger-120 green "></i> Guardar' : '<i class="ace-icon fa fa-floppy-o bigger-120  "></i> Guardar' , ['class' => ($model->isNewRecord) ? 'btn btn-white btn-success btn-bold pull-right' : 'btn btn-white btn-primary btn-bold pull-right']  ) ?>
                          </div>
												</div>

											</div>
										<div></div></div>

<?php ActiveForm::end(); ?>
