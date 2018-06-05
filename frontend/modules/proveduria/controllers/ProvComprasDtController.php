<?php

namespace frontend\modules\proveduria\controllers;

use Yii;
use common\models\ProvComprasDt;
use common\models\ProvComprasDtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ProvComprasDtController implements the CRUD actions for ProvComprasDt model.
 */
class ProvComprasDtController extends Controller
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
     * Lists all ProvComprasDt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProvComprasDtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddData($id_art,$cnt_p,$cnt_r){
      $model= new ProvComprasDt();
        $model->id_art=$id_art;
        $model->cnt=$cnt_r;
        $model->cnt_pedida=$cnt_p;
        Yii::$app->response->format = Response::FORMAT_JSON;

            if ($model->validate()){
              //----- response json ---
              return [
                'id_art'=>$model->idArt->id,
                'ref'=>$model->idArt->ref,
                'descripcion'=>$model->idArt->descripcion,
                'cnt_p'=>$model->cnt_pedida,
                'cnt_r'=>$model->cnt
              ];

            } else {
              //---- error response ----

            }


    }

    /**
     * Displays a single ProvComprasDt model.
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
     * Creates a new ProvComprasDt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


     public function actionModal($submit = false,$id_art)
 {
   $model = new ProvComprasDt();
   $model->id_art=$id_art;


     if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
         Yii::$app->response->format = Response::FORMAT_JSON;
         return ActiveForm::validate($model);
     }

     if ($model->load(Yii::$app->request->post())) {
         if ($model->validate()) {

             Yii::$app->response->format = Response::FORMAT_JSON;

             return [
                 'ref' => $model->idArt->ref,
                 'descripcion'=>$model->idArt->descripcion,
                 'cnt'=>$model->cnt
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
     * Updates an existing ProvComprasDt model.
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
     * Deletes an existing ProvComprasDt model.
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
     * Finds the ProvComprasDt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProvComprasDt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProvComprasDt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
