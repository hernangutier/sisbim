<?php

namespace frontend\modules\mantenimiento\controllers;


use Yii;
use common\models\PersonalCarga;
use common\models\PersonalCargaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Json;


/**
 * PersonalCargaController implements the CRUD actions for PersonalCarga model.
 */
class PersonalCargaController extends Controller
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
     * Lists all PersonalCarga models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new PersonalCargaSearch();
        $searchModel->id_int=$id;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = 'main';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$searchModel->idInt,
        ]);
    }

    /**
     * Displays a single PersonalCarga model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PersonalCarga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($submit = false, $id)
          {
              $model = PersonalCarga::getInstace();
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
     * Updates an existing PersonalCarga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
     * Deletes an existing PersonalCarga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$temp=$this->findModel($id);
        $this->findModel($id)->delete();
        //return $this->redirect(['index','id'=>$temp->id_int]);

    }

    /**
     * Finds the PersonalCarga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PersonalCarga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PersonalCarga::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
