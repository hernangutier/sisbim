<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\Personal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\AuConstancias */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//------------- Variables de PHP a JavaScript -----

    $_POST['urlfind']=Url::toRoute('au-constancias/find','http');


  echo "<script>\n";

  echo "urlJsFind='".$_POST['urlfind']."'\n";

  echo "</script>\n";

 ?>


<div class="au-constancias-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3 class="header smaller lighter blue">
				<i class="ace-icon fa fa-bullhorn"></i>
				Seleecione el Integrante (Constancia Laboral)
	  </h3>
    <?php //-------------- Cargo -------------

        echo $form->field($model, 'id_int')->widget(Select2::classname(), [

             'data' => ArrayHelper::map(common\models\Personal::find()->asArray()->all(),'id','nombres'),
             'language' => 'es',

             'options' => ['placeholder' => 'Seleccione el Integrante'],
             'pluginOptions' => [
             'allowClear' => true,

             ],
             'pluginEvents' => [
                          "change" => 'function(e) {

                            e.preventDefault();
                            var id=$(this).val();
                            if ($(this).val()>0) {
                            $(".detalles").show();
                            $.ajax({
                                type     :"POST",
                                cache    : false,
                                url  : urlJsFind,
                                data: {id: id},
                                dataType: "json",
                                success  : function(data) {
                                    $("#ced").text(data.cedrif);
                                    $("#nombre").text(data.nombres);

                                }
                                });
                              } else {
                                  $(".detalles").hide();
                              }
                          }',

                ],

             ]);

     ?>

     <div class="detalles" style="display:none">
     <h4 class="blue">
                              <span class="label label-primary arrowed-in-right">
                                 <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                       Datos del Integrante
                              </span>
                       </h4>

                     <div class="profile-user-info profile-user-info-striped">
                                         <div class="profile-info-row">
                                           <div class="profile-info-name">Cedula </div>

                                           <div class="profile-info-value">
                                             <span class="editable" id="ced"></span>
                                           </div>
                                         </div>

                                         <div class="profile-info-row">
                                           <div class="profile-info-name"> Nombre y Apellido </div>

                                           <div class="profile-info-value">
                                             <span class="editable" id="nombre"></span>
                                           </div>
                                         </div>





                       </div>
            <div class="space-10"></div>
            <div class="form-group">
                <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
            </div>
     </div>


    <?php ActiveForm::end(); ?>

</div>
