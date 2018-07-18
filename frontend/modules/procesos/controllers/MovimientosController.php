<?php

namespace frontend\modules\procesos\controllers;

use Yii;
use common\models\Movimientos;
use common\models\MovimientosSearch;
use common\models\MovimientosDtSearch;
use common\models\MovimientosDt;
use common\models\Responsables;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * MovimientosController implements the CRUD actions for Movimientos model.
 */
class MovimientosController extends Controller
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
     * Lists all Movimientos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovimientosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Movimientos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id){

      // validate if there is a editable input saved via AJAX
    if (Yii::$app->request->post('hasEditable')) {
        // instantiate your book model for saving
        $dtId = Yii::$app->request->post('editableKey');
        $model = MovimientosDt::findOne($dtId);

        // store a default json response as desired by editable
        $out = Json::encode(['output'=>'', 'message'=>'']);

        // fetch the first entry in posted data (there should only be one entry
        // anyway in this array for an editable submission)
        // - $posted is the posted data for Book without any indexes
        // - $post is the converted array for single model validation
        $posted = current($_POST['MovimientosDt']);
        $post = ['detalle' => $posted];

        if (isset($posted['id_und_destino'])){
            $model->id_und_destino=$posted['id_und_destino'];
            $output=$model->id_und_destino;
            if ($model->save() ) {
              $out = Json::encode(['output'=>$output, 'message'=>'']);
              echo $out;
              return;
            }

        }

        if (isset($posted['id_user_new'])){
            $model->id_user_new=$posted['id_user_new'];
            $output=$model->id_user_new;
            if ($model->save() ) {
              $out = Json::encode(['output'=>$output, 'message'=>'']);
              echo $out;
              return;
            }

        }

        if (isset($posted['estado_fisico'])){
            $model->estado_fisico=$posted['estado_fisico'];
            $output=$model->estado_fisico;
            if ($model->save() ) {
              $out = Json::encode(['output'=>$output, 'message'=>'']);
              echo $out;
              return;
            }

        }








        // load model like any single model validation

        // return ajax json encoded response and exit

    }

      $searchModel = new MovimientosDtSearch();
      $searchModel->id_mov=$id;
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
        ]);
    }

    /**
     * Creates a new Movimientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movimientos();
        $model->id_user=Yii::$app->user->identity->id_bm;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $this->layout="main";
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionDesvincular()
    {
      $model = new \frontend\models\FormDesvincular();
      $this->layout="main";
      return $this->render('desvincular', [
          'model' => $model,
      ]);
    }


   public function actionDesvincularSave($id,$motivo)
   {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //--------- Consultamos el Usuario ----
        $resp=Responsables::findOne($id);
        $lsBm=$resp->bienes;
        //------- Creamos el Movimiento ------
        $model= new Movimientos();


        $transaction = Movimientos::getDb()->beginTransaction();
          try {
            $model->id_und_origen=$resp->id_unidad;
            $model->observaciones=$motivo;
            $model->id_user=Yii::$app->user->identity->id_bm;

            $model->save();
            $model->refresh();
            //----- Creamos los Detalles -----
            foreach ($lsBm as $bien) {
              if ($bien->tipobien==0) {
              $dt= new MovimientosDt();
                  $dt->id_bien=$bien->id;
                      $dt->id_mov=$model->id;
                          $dt->id_user_old=$id;
                        $dt->id_user_new=null;
                      $dt->estado_fisico=6;
                    $dt->id_und_destino=$resp->id_unidad;
                  $dt->save();
              }
            }

            $model->status=1;
            $model->save();
            $transaction->commit();

            return $resp=true;
          } catch (\Exception $e) {
            return $err=false;
          }












   }

    /**
     * Updates an existing Movimientos model.
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
     * Deletes an existing Movimientos model.
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
     * Finds the Movimientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Movimientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movimientos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionAddItems($id_mov,$id_bien)
    {
      $model= new MovimientosDt();
        $model->id_mov=$id_mov;
        $model->id_bien=$id_bien;
        $model->estado_fisico=$model->idBien->estado_fisico;

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



    public function actionBienesList($q = null, $id = null,$id_und) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'codigo' => '','descripcion'=>'']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('vw_bienes_activos')
            ->where(['like', 'tostring', $q])
            ->andWhere(['id_und_actual'=>$id_und])
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




}
