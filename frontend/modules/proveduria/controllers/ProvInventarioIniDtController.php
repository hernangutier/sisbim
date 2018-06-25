<?php

namespace frontend\modules\proveduria\controllers;

use Yii;
use common\models\ProvInventarioIniDt;
use common\models\ProvInventarioIniDtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
/**
 * ProvInventarioIniDtController implements the CRUD actions for ProvInventarioIniDt model.
 */
class ProvInventarioIniDtController extends Controller
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
     * Lists all ProvInventarioIniDt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProvInventarioIniDtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProvInventarioIniDt model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {


      return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProvInventarioIniDt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProvInventarioIniDt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProvInventarioIniDt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProvInventarioIniDt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
    }

    /**
     * Finds the ProvInventarioIniDt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProvInventarioIniDt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProvInventarioIniDt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //------------ Funciones Ajax -----
    public function actionAddData($id){
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $model= new ProvInventarioIniDt();
      $model->id_art=$id;
      $model->id_inv=1;
      $model->cnt=1;

      if ($model->validateDuplicate()){
        return [
          'result'=>date("Y-m-d",strtotime("+1 day")),

        ];
      } else {
          if ($model->save()){
              return [
                'result'=>null,
            ];
          } else {
            return [
              'result'=>'Error',
          ];
          }
      }

    }
}
