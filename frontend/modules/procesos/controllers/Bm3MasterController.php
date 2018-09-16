<?php

namespace frontend\modules\procesos\controllers;

use Yii;
use common\models\Bm3Master;
use common\models\Bm3MasterSearch;
use common\models\Bm3Detail;
use common\models\Periodos;
use common\models\Bm3DetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;


/**
 * Bm3MasterController implements the CRUD actions for Bm3Master model.
 */
class Bm3MasterController extends Controller
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
     * Lists all Bm3Master models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Bm3MasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bm3Master model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
      $searchModel = new Bm3DetailSearch();
      $searchModel->id_bm3=$id;
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $this->layout="main";
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }

    /**
     * Creates a new Bm3Master model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bm3Master();
        $model->date_ini=date('Y-m-d');
        $model->id_user=Yii::$app->user->identity->id_bm;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $this->layout="main";
        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionOpen(){
      $this->layout="main";
      $model=Bm3Master::find()->where(['id_periodo'=>Periodos::getActivo()->id])->one();
      if (isset($model)){
        return $this->redirect(['view', 'id' => $model->id]);
      }



      return $this->redirect(['create']);

    }

    /**
     * Updates an existing Bm3Master model.
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
     * Deletes an existing Bm3Master model.
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
     * Finds the Bm3Master model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bm3Master the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bm3Master::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionBienesList($q = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'codigo' => '','descripcion'=>'', 'ubicacion'=>'']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('vw_bienes_disp_bm3')
            ->where(['like', 'tostring', strtoupper($q)])
            ->limit(40);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'codigo'=>Bienes::find($id)->codigo, 'descripcion' => Bienes::find($id)->descripcion,'ubicacion' => Bienes::find($id)->idUndActual->descripcion];
    }
    return $out;
}


public function actionAddItems($id_bm3,$id_bien)
{

    $model= new Bm3Detail();
    $model->id_bm3=$id_bm3;
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
