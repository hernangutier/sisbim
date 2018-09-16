<?php
use common\models\Priodos;
use common\models\PeriodosSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Periodos */



?>

<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered table-condensed table-hover small kv-table">
                <tbody><tr class="success">
                    <th colspan="3" class="text-center text-success">Saldos del Inventario Bienes Muebles</th>
                </tr>
                <tr class="active">
                    <th class="text-center">#</th>
                    <th>Descripción</th>
                    <th class="text-right">Saldo Bs.</th>
                </tr>
                <tr>
                    <td class="text-center">1</td><td>Saldo Inicial</td><td class="text-right"><b><?= number_format($model->saldo_bm_ini,2) ?></b> </td>
                </tr>
                <tr>
                    <td class="text-center">2</td><td>Incorporaciones en el Mes</td><td class="text-right"> <b class=green><?= number_format($model->saldo_in_bm,2) ?></b> </td>
                </tr>
                <tr>
                    <td class="text-center">3</td><td>Desincorporaciones en el Mes</td><td class="text-right"> <b class="red"><?= number_format($model->saldo_out_bm,2) ?></b></td>
                </tr>
								<tr>
                    <td class="text-center">4</td><td> Desincorporaciones en el Mes (60 Faltantes por Investigar)</td><td class="text-right"> <b class="orange"> <?= number_format($model->saldo_out_faltantes,2) ?> </b> </td>
                </tr>
                <tr class="warning">
                    <th></th><th>Total</th><th class="text-right"><?= number_format($model->getTotals(),2)  ?></th>
                </tr>
            </tbody></table>
	</div>


	<div class="col-sm-4">
		<table class="table table-bordered table-condensed table-hover small kv-table">
                <tbody><tr class="success">
                    <th colspan="3" class="text-center text-success">Resumen Conteo Bienes Muebles</th>
                </tr>
                <tr class="active">
                    <th class="text-center">#</th>
                    <th>Descripción</th>
                    <th class="text-right">Existencias</th>
                </tr>
                <tr>
                    <td class="text-center">1</td><td>Existencia Inicial</td><td class="text-right"><b><?= number_format($model->saldo_bm_ini,2) ?></b> </td>
                </tr>
                <tr>
                    <td class="text-center">2</td><td>Bienes Incorporados</td><td class="text-right"> <b class=green><?= number_format($model->saldo_in_bm,2) ?></b> </td>
                </tr>
                <tr>
                    <td class="text-center">3</td><td>Bienes Desincorporados</td><td class="text-right"> <b class="red"><?= number_format($model->saldo_out_bm,2) ?></b></td>
                </tr>
								<tr>
                    <td class="text-center">4</td><td> Bienes (60 Faltantes por Investigar)</td><td class="text-right"> <b class="orange"> <?= number_format($model->saldo_out_faltantes,2) ?> </b> </td>
                </tr>
                <tr class="warning">
                    <th></th><th>Total</th><th class="text-right"><?= number_format($model->getTotals(),2)  ?></th>
                </tr>
            </tbody></table>
	</div>


	<div class="col-sm-2">
		<div class="kv-button-stack">
			<button type="button" class="btn btn-default btn-lg" title="" data-toggle="tooltip" data-original-title="Imprimir BM1"><span class="ace-icon fa fa-print"></span>BM1</button>
			<button type="button" class="btn btn-default btn-lg" title="" data-toggle="tooltip" data-original-title="Imprimir BM2"><span class="ace-icon fa fa-print"></span>BM2</button>
			<button type="button" class="btn btn-default btn-lg" title="" data-toggle="tooltip" data-original-title="Imprimir BM3"><span class="ace-icon fa fa-print"></span>BM3</button>
			<button type="button" class="btn btn-default btn-lg" title="" data-toggle="tooltip" data-original-title="Imprimir BM4"><span class="ace-icon fa fa-print"></span>BM4</button>
		</div>

	</div>
</div>
</div>
