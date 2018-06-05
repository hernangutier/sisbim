<?php

namespace frontend\modules\mantenimiento\controllers;

use Yii;
use common\models\PersonalPermisos;
use common\models\PersonalPermisosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * PersonalPermisosController implements the CRUD actions for PersonalPermisos model.
 */
class PersonalPermisosController extends Controller
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
     * Lists all PersonalPermisos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalPermisosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonalPermisos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PersonalPermisos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($submit = false, $id, $file=null)
          {
              $model =  PersonalPermisos::getInstance();
              $model->id_int=$id;

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
     * Updates an existing PersonalPermisos model.
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
     * Deletes an existing PersonalPermisos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PersonalPermisos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PersonalPermisos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PersonalPermisos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
