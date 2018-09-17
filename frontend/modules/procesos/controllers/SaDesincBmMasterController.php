<?php

namespace frontend\modules\procesos\controllers;

use Yii;
use common\models\SaDesincBmMaster;
use common\models\SaDesincBmMasterSearch;
use common\models\SaDesincBmDetailSearch;
use common\models\SaDesincBmDetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * SaDesincBmMasterController implements the CRUD actions for SaDesincBmMaster model.
 */
class SaDesincBmMasterController extends Controller
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
     * Lists all SaDesincBmMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaDesincBmMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SaDesincBmMaster model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
      $searchModel = new SaDesincBmDetailSearch();
      $searchModel->id_des=$id;
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $this->layout="main";
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);

    }
    /**
     * Creates a new SaDesincBmMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SaDesincBmMaster();
        $this->layout="main";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SaDesincBmMaster model.
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
     * Deletes an existing SaDesincBmMaster model.
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
     * Finds the SaDesincBmMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SaDesincBmMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SaDesincBmMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionBienesList($q = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'codigo' => '','descripcion'=>'']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('vw_bienes_activos')
            ->where(['like', 'tostring', strtoupper($q)])
            ->limit(40);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'codigo'=>Bienes::find($id)->codigo, 'descripcion' => Bienes::find($id)->descripcion];
    }
    return $out;
}

public function actionAddItems($id_des,$id_bien)
{

    $model= new SaDesincBmDetail();
    $model->id_des=$id_des;
    $model->id_bien=$id_bien;


    Yii::$app->response->format = Response::FORMAT_JSON;
    if ($model->isDuplicate()){
      return $error=true;
    }

    if ($model->save()){
      return $error=false;
    } else {
      return $error=true;
    }
}

}
