<?php

namespace frontend\modules\procesos\controllers;

use Yii;
use common\models\Responsables;
use common\models\Bienes;
use common\models\ResponsablesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ResponsablesController implements the CRUD actions for Responsables model.
 */
class ResponsablesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Responsables models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ResponsablesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout='main';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionFreeBienes($id){
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $sql="UPDATE  bienes set id_resp_directo=null where id_resp_directo=".$id;
        try {
            Yii::$app->db->createCommand($sql)->execute();
            return [
              'result'=>true
            ];
        }catch (Exception $e){
          return [
            'result'=>false
          ];
        }

    }

    /**
     * Displays a single Responsables model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout='main';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionBienes($id)
    {
      $ls =Bienes::find()->where(['id_resp_directo'=>$id])->andWhere(['tipobien'=>0])
      ->andWhere(['activo'=>1])->all();
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      return $ls;

    }
    /**
     * Creates a new Responsables model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Responsables();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $this->layout='main';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Responsables model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $this->layout='main';
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Responsables model.
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
     * Finds the Responsables model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Responsables the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Responsables::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
