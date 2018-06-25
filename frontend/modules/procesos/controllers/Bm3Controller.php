<?php

namespace frontend\modules\procesos\controllers;

use Yii;
use common\models\Bm3;
use common\models\Periodos;
use common\models\Bm3Search;
use common\models\Bm3DtSearch;
use common\models\Bm3Dt;
use common\models\Bienes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;


/**
 * Bm3Controller implements the CRUD actions for Bm3 model.
 */
class Bm3Controller extends Controller
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
     * Lists all Bm3 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Bm3Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionProcesar($id)
    {
      $model= $this->findModel($id);
      $model->status=1;
        if ($model->save()){
          return $error=false;
        }else {
          return $error=true;
        }
    }


    public function FunctionName($value='')
    {
      # code...
    }

    public function actionAddItems($id_bm3,$id_bien)
    {
      $model= new Bm3Dt();
        $model->id_bm3=$id_bm3;
        $model->id_bien=$id_bien;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->save()){
          return $error=false;
        } else {
          return $error=true;
        }
    }

    /**
     * Displays a single Bm3 model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
      $searchModel = new Bm3DtSearch();
      $searchModel->id_bm3=$id;
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }


    public function actionBienesList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'codigo' => '','descripcion'=>'']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('vw_bienes_activos')
            ->where(['like', 'tostring', strtoupper($q)])
            //->where(['id_und_actual'=>$id_und])
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

    /**
     * Creates a new Bm3 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bm3();
        $model->id_periodo=Periodos::getActivo()->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout="main";
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bm3 model.
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
     * Deletes an existing Bm3 model.
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
     * Finds the Bm3 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bm3 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bm3::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
