<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use common\models\ResponsablesSearch;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadesAdmin */

$this->title = 'Datos de la Unidad Funcional.: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Unidades Admnistrativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='container '>




<div class="btn-toolbar">

  <div class="btn-group">
                        <button class="btn btn-default">Ir a</button>

                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                          <span class="ace-icon fa fa-caret-down icon-only"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-success">
                          <li>
                            <a href="<?php Url::home() ?>">Inicio</a>
                          </li>

                          <li>
                            <a href="<?= Url::to(['/unidades-admin/index']) ?>">Unidades Administrativas</a>
                          </li>


                        </ul>
</div>
    <a href="<?= Url::to(['/unidades-admin/update','id'=>$model->id]) ?>" class="btn btn-primary">
                            <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                            Actualizar
    </a>
</div>




                    <h4 class="blue">
                           <span class="label label-success arrowed-in arrowed-right">
                              <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                    <b>Datos Principales</b>
                           </span>
                    </h4>



                          <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                              <div class="profile-info-name">Código </div>

                                              <div class="profile-info-value">
                                                <span class="editable" id="username"><ide>   <?= $model->codigo ?></ide></span>
                                              </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Descripción </div>

                                              <div class="profile-info-value">
                                                <span class="editable" id="username"><?= $model->descripcion ?></span>
                                              </div>
                                            </div>


                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Categoria (SUDEBIP) </div>

                                              <div class="profile-info-value">

                                                <span class="editable" id="username"><?= $model->categoria0->descripcion ?></span>
                                              </div>
                                            </div>


                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Telefono </div>

                                                <div class="profile-info-value">
                                                  <i class="fa fa-phone light-orange bigger-110"></i>
                                                  <span class="editable" id="country"><?= $model->telefono  ?></span>
                                                  </div>
                                              </div>


                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Extención </div>

                                                <div class="profile-info-value">
                                                  <i class="fa fa-phone light-orange bigger-110"></i>
                                                  <span class="editable" id="country"><?= $model->tel_ext  ?></span>
                                                  </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Email </div>

                                                <div class="profile-info-value">
                                                  <i class="fa fa-envelope-o light-orange bigger-110"></i>
                                                  <span class="editable" id="country"><?= $model->email  ?></span>
                                                  </div>
                                              </div>




                                            </div>




                        <h4 class="blue">


                                <span class="label label-primary arrowed-in arrowed-right">
                                  <i class="ace-icon fa fa-ide-fork smaller-80 align-middle"></i>
                                  <b>Datos de Ubicación</b>
                                </span>
                        </h4>

                        <div class="profile-user-info profile-user-info-striped">
                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> Ubicación (SUDEBIP) </div>

                                            <div class="profile-info-value">
                                              <i class="fa fa-map-marker light-orange bigger-110"></i>
                                              <span class="editable" id="username"><?= $model->ubicacion ?></span>
                                            </div>
                                          </div>




                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Sede de Adscripcion (SUDEBIP) </div>

                                              <div class="profile-info-value">
                                                <span class="editable" id="username"><?= $model->idsede0->descripcion ?></span>
                                              </div>
                                            </div>



                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Encargado </div>

                                              <div class="profile-info-value">
                                                <i class="fa fa-fax light-orange bigger-110"></i>

                                                </div>
                                            </div>



                                          </div>




                      <h4 class="blue">


                              <span class="label label-primary arrowed-in arrowed-right">
                                <i class="ace-icon fa fa-bookmark-o smaller-80 align-middle"></i>
                                <b>Datos Adicionales</b>
                              </span>
                      </h4>

                      <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                          <div class="profile-info-name"> Es una Ubicación de entrada </div>

                                          <div class="profile-info-value">
                                            <span class="editable" id="username"><?= $model->getAplicaInputHtml() ?></span>
                                          </div>
                                        </div>

                                        <div class="profile-info-row">
                                          <div class="profile-info-name"> Telefono Contacto </div>

                                          <div class="profile-info-value">
                                            <i class="fa fa-phone light-orange bigger-110"></i>
                                            <span class="editable" id="username"><?= $model->id ?></span>
                                          </div>
                                        </div>


                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> Observaciones </div>

                                            <div class="profile-info-value">
                                              <span class="editable" id="username"><?= $model->id ?></span>
                                            </div>
                                          </div>

                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> Estatus </div>

                                            <div class="profile-info-value">
                                                  <?php
                                                      echo $model->id;
                                                   ?>

                                            </div>
                                          </div>



                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> Fecha de Creación </div>

                                            <div class="profile-info-value">
                                              <i class="fa fa-calendar light-orange bigger-110"></i>
                                              <span class="editable" id="country"><?= $model->id  ?></span>
                                              </div>
                                          </div>


                                        </div>


                                        <h4 class="blue">


                                                <span class="label label-primary arrowed-in arrowed-right">
                                                  <i class="ace-icon fa fa-bookmark-o smaller-80 align-middle"></i>
                                                  <b>Usuarios Asignados</b>
                                                </span>
                                        </h4>
                                        <?php

                                          $searchModel = new ResponsablesSearch();
                                          $searchModel->id_unidad=$model->id;
                                          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                                         ?>




                                        <?= GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],
                                                'cedrif',
                                                'nombres',
                                              ],

                                        ]); ?>




</div>
</div>
