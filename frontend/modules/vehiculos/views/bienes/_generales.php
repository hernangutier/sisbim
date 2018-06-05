<?php
use common\models\GvAccesoriosVehiculos;
use common\models\GvAccesoriosVehiculosSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Bienes */



?>



<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> N° de Bien </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?= $model->codigo ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Descripción </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?= $model->descripcion ?></span>
													</div>
												</div>

                        <div class="profile-info-row">
													<div class="profile-info-name">Unidad Funcional</div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?= $model->idUndActual->descripcion ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Localización </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
															<span class="editable editable-click" id="city"><?= $model->localizacion  ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Age </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="age">38</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Joined </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="signup">2010/06/20</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Last Online </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="login">3 hours ago</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> About Me </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about">Editable as WYSIWYG</span>
													</div>
												</div>
											</div>
