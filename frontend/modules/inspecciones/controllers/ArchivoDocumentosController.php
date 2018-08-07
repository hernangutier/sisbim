<?php

namespace frontend\modules\inspecciones\controllers;

use Yii;
use common\models\ArchivoDocumentos;
use frontend\models\ArchivoDocumentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ArchivoDocumentosController implements the CRUD actions for ArchivoDocumentos model.
 */
class ArchivoDocumentosController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all ArchivoDocumentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArchivoDocumentos3Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArchivoDocumentos model.
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
     * Creates a new ArchivoDocumentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArchivoDocumentos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreateModal($submit = false,$id_archivo)
{
  $model = new ArchivoDocumentos();
  $model->id_archivo=$id_archivo;


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

    return $this->renderAjax('create', [
        'model' => $model,
    ]);
}

    /**
     * Updates an existing ArchivoDocumentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate($submit = false,$id)
 {
   $model = $this->findModel($id);



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

     return $this->renderAjax('update', [
         'model' => $model,
     ]);
 }

    /**
     * Deletes an existing ArchivoDocumentos model.
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
     * Finds the ArchivoDocumentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArchivoDocumentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArchivoDocumentos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
