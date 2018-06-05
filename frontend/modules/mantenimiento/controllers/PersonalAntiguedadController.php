<?php

namespace frontend\modules\mantenimiento\controllers;

use Yii;
use common\models\PersonalAntiguedad;
use common\models\PersonalAntiguedadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Json;
use kartik\widgets\Alert;

/**
 * PersonalAntiguedadController implements the CRUD actions for PersonalAntiguedad model.
 */
class PersonalAntiguedadController extends Controller
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
     * Lists all PersonalAntiguedad models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new PersonalAntiguedadSearch();
        $searchModel->id_int=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->layout = 'main';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonalAntiguedad model.
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
     * Creates a new PersonalAntiguedad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($submit = false, $id)
          {
              $model = new PersonalAntiguedad();
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

          public function actionUpdate($id, $submit = false)
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
                      'message' => 'Registro Guardado con Exito...',
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
     * Deletes an existing PersonalAntiguedad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

          return    '<p> Hola </p>';


    }



    /**
     * Finds the PersonalAntiguedad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PersonalAntiguedad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PersonalAntiguedad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
