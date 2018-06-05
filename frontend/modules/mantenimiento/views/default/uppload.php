<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
/* @var $model common\models\Uppload */
?>





<?php $form = ActiveForm::begin([
     "method" => "post",
     "enableClientValidation" => true,
     "options" => ["enctype" => "multipart/form-data"],
     ]);
?>

<div id="user-profile-3" class="user-profile row">

  <div class="col-sm-12">
  <label class='ace-file-input ace-file-multiple'>
        <?= $form->field($model, 'file')->fileInput() ?>


    </i></span><div>
    </div></span><a class='remove' href='#'><i class=' ace-icon fa fa-times'></i></a></label>
</div>
</div>



<div class="form-group">
    <?= Html::submitButton('<i class="ace-icon fa fa-upload bigger-120 blue"></i> Subir', ['class' => 'btn btn-white btn-info  btn-round btn-bold']) ?>
</div>

<?php $form->end() ?>


<?php
    $this->registerJs("
    $('#user-profile-3')
  .find('input[type=file]').ace_file_input({
    style:'well',
    btn_choose:'Seleccionar Foto',
    btn_change:null,
    no_icon:'ace-icon fa fa-picture-o',
    thumbnail:'large',
    droppable:true,

    allowExt: ['jpg', 'jpeg', 'png', 'gif'],
    allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
  })
  .end().find('button[type=reset]').on(ace.click_event, function(){
      $('#user-profile-3 input[type=file]').ace_file_input('reset_input');
    })
//  $('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);

    ");

 ?>
