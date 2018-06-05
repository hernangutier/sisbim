<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */


?>


<?php

$gridColumns = [
// the name column configuration

// the buy_amount column configuration



['class' => 'kartik\grid\SerialColumn'],

[
'class'=>'kartik\grid\EditableColumn',
'attribute'=>'lim_inf',
'editableOptions'=>[
  'header'=>'Cancelar Antes de (Dias)',
  'formOptions'=>['action' => ['/compras/prov-pronto-pago/salvar']], // point to the new action
  'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
  'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]]
],
'hAlign'=>'right',
'vAlign'=>'middle',
//s'width'=>'100px',

],

[
  'class'=>'kartik\grid\EditableColumn',
  'attribute'=>'percent',
  'editableOptions'=>[
      'header'=>'Buy Amount',
      'formOptions'=>['action' => ['/compras/prov-pronto-pago/salvar']], // point to the new action
      'inputType'=>\kartik\editable\Editable::INPUT_MONEY,
      'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]]
  ],
  'hAlign'=>'right',
  'vAlign'=>'middle',
  //'width'=>'100px',
  'format'=>['decimal', 2],
  'pageSummary'=>true
],



];

 ?>


    <?=  \kartik\grid\GridView::widget([
    'dataProvider'=>$dataProvider,


    'columns'=> $gridColumns,
    'pjax'=>true,
    
    'responsive'=>true,
'hover'=>true

  ]); ?>
