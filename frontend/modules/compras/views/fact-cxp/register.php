<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\FactCxp */

$this->title = 'Procesamiento de Compra';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<!-- #section:pages/invoice -->
										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													<i class="ace-icon fa fa-leaf green"></i>
													Procesando Compra
												</h3>

												<!-- #section:pages/invoice.info -->
												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">Invoice:</span>
													<span class="red">#121212</span>

													<br>
													<span class="invoice-info-label">Date:</span>
													<span class="blue">04/04/2014</span>
												</div>

												<div class="widget-toolbar hidden-480">
													<a href="#">
														<i class="ace-icon fa fa-print"></i>
													</a>
												</div>

												<!-- /section:pages/invoice.info -->
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Proveedor</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled spaced">
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i><?= $model->idProv->rif  ?>
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i><?= $model->idProv->razon  ?>
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i><?= $model->idProv->direccion  ?>
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>
                                        Telefono:
																		<b class="red"><?= $model->idProv->telefono  ?></b>
																	</li>

																	<li class="divider"></li>

                                  <li>
																		<i class="ace-icon fa fa-caret-right blue"></i>
                                        Retención:
																		<b class="red"><?= number_format($model->idProv->retencion,2). ' %'  ?></b>
																	</li>
																</ul>
															</div>
														</div><!-- /.col -->

														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
																	<b>Sub->Totales</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled  spaced">
																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>Street, City
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>Zip Code
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>State, Country
																	</li>

																	<li class="divider"></li>

																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>
																		Contact Info
																	</li>
																</ul>
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space"></div>

													<div>
														
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Total amount :
																<span class="red">$395</span>
															</h4>
														</div>
														<div class="col-sm-7 pull-left"> Extra Information </div>
													</div>

													<div class="space-6"></div>
													<div class="well">
														Thank you for choosing Ace Company products.
				We believe you will be satisfied by our services.
													</div>
												</div>
											</div>
										</div>

										<!-- /section:pages/invoice -->
									</div>
								</div>
