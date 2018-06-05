<?php

namespace frontend\modules\mantenimiento\controllers;

use Yii;
use common\models\PersonalExp;
use common\models\Uppload;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Json;
/**
 * PersonalExpController implements the CRUD actions for PersonalExp model.
 */
class PersonalExpController extends Controller
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
     * Lists all PersonalExp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalExpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonalExp model.
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
     * Creates a new PersonalExp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($submit = false, $id)
          {
              $model = new PersonalExp();
              $upload= new Uppload();
              $upload->patch="integrantes/expedientes/";
              $model->id_int=$id;

              if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) &&  $submit == false) {
                  Yii::$app->response->format = Response::FORMAT_JSON;
                  return ActiveForm::validate($model);
              }

              if ($model->load(Yii::$app->request->post()) && $upload->load(Yii::$app->request->post()) && $submit=true) {

                  if ($model->save()) {
                      $model->refresh();
                      //-------- Adjuntamos el Archivo -----
                      $variable= $upload->upload($model->id);
                      //------------------------------------
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
                  'upload'=>$upload,
              ]);
          }


          public function actionUpdate($submit = false, $id)
               {
                   $model = $this->findModel($id);

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

                   $this->layout = 'main';
                   return $this->renderAjax('update', [
                       'model' => $model,
                   ]);
               }

    /**
     * Deletes an existing PersonalExp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();


    }

    /**
     * Finds the PersonalExp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PersonalExp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PersonalExp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
