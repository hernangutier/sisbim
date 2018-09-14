<?php
use common\models\DivSemovientes;
use common\models\DivSemovientesSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArchivoDocumentos */



?>




<div class="row">

  <div class="col-sm-6">
    <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                      <h4 class="widget-title lighter">
                        <i class="ace-icon fa fa-star orange"></i>
                        Resumen Semovientes
                      </h4>

                      <div class="widget-toolbar">
                        <a href="#" data-action="collapse">
                          <i class="ace-icon fa fa-chevron-up"></i>
                        </a>
                      </div>
                    </div>

                    <div class="widget-body">
                      <div class="widget-main no-padding">
                        <table class="table table-bordered table-striped">
                          <thead class="thin-border-bottom">
                            <tr>
                              <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Categoria
                              </th>

                              <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Total (Hembras)
                              </th>

                              <th class="hidden-480">
                                <i class="ace-icon fa fa-caret-right blue"></i>Total (Machos)
                              </th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>Becerro(a)s</td>

                              <td>

                                <b class="red"><?= DivSemovientes::find()->where(['sexo'=>'H'])->andWhere(['id_insp'=>$model->id])->andWhere(['categoria'=>2])->count()  ?></b>
                              </td>

                              <td>

                                <b class="blue"><?= DivSemovientes::find()->where(['sexo'=>'M'])->andWhere(['id_insp'=>$model->id])->andWhere(['categoria'=>2])->count()  ?></b>
                              </td>
                            </tr>

                            <tr>
                              <td>Maute(a)s</td>
                              <td>

                                <b class="red"><?= DivSemovientes::find()->where(['sexo'=>'H'])->andWhere(['id_insp'=>$model->id])->andWhere(['categoria'=>3])->count()  ?></b>
                              </td>

                              <td>

                                <b class="blue"><?= DivSemovientes::find()->where(['sexo'=>'M'])->andWhere(['id_insp'=>$model->id])->andWhere(['categoria'=>3])->count()  ?></b>
                              </td>
                            </tr>

                            <tr>
                              <td>Novillo(a)s</td>
                              <td>

                                <b class="red"><?= DivSemovientes::find()->where(['sexo'=>'H'])->andWhere(['id_insp'=>$model->id])->andWhere(['categoria'=>4])->count()  ?></b>
                              </td>

                              <td>

                                <b class="blue"><?= DivSemovientes::find()->where(['sexo'=>'M'])->andWhere(['id_insp'=>$model->id])->andWhere(['categoria'=>4])->count()  ?></b>
                              </td>
                            </tr>

                            <tr>
                              <td>Vacas</td>
                              <td colspan=2>

                                <b class="red"><?= DivSemovientes::find()->where(['sexo'=>'H'])->andWhere(['id_insp'=>$model->id])->andWhere(['categoria'=>0])->count()  ?></b>
                              </td>


                            </tr>

                            <tr>
                              <td>Toros</td>
                              <td colspan=2>

                                <b class="blue"><?= DivSemovientes::find()->where(['id_insp'=>$model->id])->andWhere(['categoria'=>1])->count()  ?></b>
                              </td>


                            </tr>
                            <tr>
                              <td><b>Totales por Sexo</b></td>
                              <td>

                                <b class="red"><?= DivSemovientes::find()->where(['id_insp'=>$model->id])->andWhere(['sexo'=>'H'])->count()  ?></b>
                              </td>

                              <td>

                                <b class="blue"><?= DivSemovientes::find()->where(['id_insp'=>$model->id])->andWhere(['sexo'=>'M'])->count()  ?></b>
                              </td>

                            </tr>

                            <tr>
                              <td><b>Totale Registro</b></td>
                              <td colspan=2>

                                <b class="green"><?= DivSemovientes::find()->where(['id_insp'=>$model->id])->count()  ?></b>
                              </td>



                            </tr>


                          </tbody>
                        </table>
                      </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                  </div>
  </div>

  <div class="col-sm-6">

  </div>

</div>
