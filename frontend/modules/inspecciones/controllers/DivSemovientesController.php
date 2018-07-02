<?php

namespace frontend\modules\inspecciones\controllers;

use Yii;
use common\models\DivSemovientes;
use common\models\DivSemovientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * DivSemovientesController implements the CRUD actions for DivSemovientes model.
 */
class DivSemovientesController extends Controller
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
     * Lists all DivSemovientes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DivSemovientesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DivSemovientes model.
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
     * Creates a new DivSemovientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($submit = false,$id_insp)
 {
   $model = new DivSemovientes();
   $model->id_insp=$id_insp;


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
     * Updates an existing DivSemovientes model.
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
     * Deletes an existing DivSemovientes model.
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
     * Finds the DivSemovientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DivSemovientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DivSemovientes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
