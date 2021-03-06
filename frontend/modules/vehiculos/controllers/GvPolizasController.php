<?php

namespace frontend\modules\vehiculos\controllers;

use Yii;
use common\models\GvPolizas;
use common\models\GvPolizasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * GvPolizasController implements the CRUD actions for GvPolizas model.
 */
class GvPolizasController extends Controller
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
     * Lists all GvPolizas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GvPolizasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GvPolizas model.
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
     * Creates a new GvPolizas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($submit = false,$id)
 {
   $model = new GvPolizas();
   $model->id_bien=$id;


     if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
         Yii::$app->response->format = Response::FORMAT_JSON;
         return ActiveForm::validate($model);
     }

     if ($model->load(Yii::$app->request->post())) {
         if ($model->save()) {
             $model->refresh();
             Yii::$app->response->format = Response::FORMAT_JSON;
             return [
                 'message' => '¡Éxito!',
             ];
         } else {
             Yii::$app->response->format = Response::FORMAT_JSON;
             return ActiveForm::validate($model);
         }
     }

     return $this->renderAjax('_form', [
         'model' => $model,
     ]);
 }

    /**
     * Updates an existing GvPolizas model.
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
     * Deletes an existing GvPolizas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GvPolizas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GvPolizas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GvPolizas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
