<?php

namespace frontend\modules\procesos\controllers;

use Yii;
use common\models\MovimientosDt;
use common\models\Bienes;
use common\models\MovimientosDtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;


/**
 * MovimientosDtController implements the CRUD actions for MovimientosDt model.
 */
class MovimientosDtController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MovimientosDt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovimientosDtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MovimientosDt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDesvincularUser($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);
        $model->id_user_new=null;
        if ($model->save()){
          return $err=false;
        } else {
          return $err=true;
        }
    }



    /**
     * Creates a new MovimientosDt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($submit = false, $id)
          {
              $model = new MovimientosDt();
              $model->id_mov=$id;

              if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
                  Yii::$app->response->format = Response::FORMAT_JSON;
                  return ActiveForm::validate($model);
              }

              if ($model->load(Yii::$app->request->post()) && $submit=true) {
                  if ($model->save()) {
                      $model->refresh();
                      Yii::$app->response->format = Response::FORMAT_JSON;
                      return [
                          'message' => 'Registro Guardado con Exito...',
                      ];
                  } else {
                      Yii::$app->response->format = Response::FORMAT_JSON;
                      return ActiveForm::validate($model);
                  }
              }

              return $this->renderAjax('create', [
                  'model' => $model,
              ]);
          }

    /**
     * Updates an existing MovimientosDt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MovimientosDt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();


    }

    /**
     * Finds the MovimientosDt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MovimientosDt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MovimientosDt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionBienesList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'codigo' => '','descripcion'=>'']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('vw_bienes_activos')
            ->where(['like', 'tostring', $q])
            ->limit(40);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'codigo'=>Bienes::find($id)->codigo, 'descripcion' => Bienes::find($id)->descripcion];
    }
    return $out;
}


   public function actionMovDtSave($id_mov,$id_bien){
     \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     $out['results'] = ['id' => $id, 'codigo'=>Bienes::find($id)->codigo, 'descripcion' => Bienes::find($id)->descripcion];
     $model= new MovimientosDt();
     $model->id_mov=$id_mov;
     $model->id_bien=$id_bien;

     $bien=Bienes::findOne($id_bien);

     if (!(is_null($bien->id_resp))) {
       $model->id_user_old=$bien->id_resp;
     }


     if ($model->save()){
          return ['status_error'=>0];
     }else {
          return ['status_error'=>1];
     }

   }
}
