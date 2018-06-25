<?php

namespace frontend\modules\proveduria\controllers;

use Yii;
use common\models\ProvInventarioIni;
use common\models\ProvInventarioIniSearch;
use common\models\ProvInventarioIniDt;
use common\models\ProvInventarioIniDtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\ProvArticulos;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * ProvInventarioIniController implements the CRUD actions for ProvInventarioIni model.
 */
class ProvInventarioIniController extends Controller
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
     * Lists all ProvInventarioIni models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProvInventarioIniSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProvInventarioIni model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

      // validate if there is a editable input saved via AJAX
    if (Yii::$app->request->post('hasEditable')) {
        // instantiate your book model for saving
        $dtId = Yii::$app->request->post('editableKey');
        $model = ProvInventarioIniDt::findOne($dtId);

        // store a default json response as desired by editable
        $out = Json::encode(['output'=>'', 'message'=>'']);

        // fetch the first entry in posted data (there should only be one entry
        // anyway in this array for an editable submission)
        // - $posted is the posted data for Book without any indexes
        // - $post is the converted array for single model validation
        $posted = current($_POST['ProvInventarioIniDt']);
        $post = ['detalle' => $posted];

        $model->cnt=$posted['cnt'];


        if ($model->save()){
          $output = Yii::$app->formatter->asDecimal($model->cnt, 2);
          $out = Json::encode(['output'=>$output, 'message'=>'']);
        }

        // load model like any single model validation

        // return ajax json encoded response and exit
        echo $out;
        return;
    }



      $searchModel = new ProvInventarioIniDtSearch();
      $searchModel->id_inv=$id;
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }


    public function actionProcesar($id)
    {
      # esto se procesa por ajax .
      $model=$this->findModel($id);
      # para cerrar el inventario
      $model->status=false;

      #--------------------------




      $model->save();
    }


    public function actionArticulosList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'ref' => '','descripcion'=>'','existencias'=>'']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('prov_articulos')
            ->where(['like', 'descripcion', strtoupper($q)])
            //->where(['id_und_actual'=>$id_und])
            ->limit(40);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'ref'=>ProvArticulos::find($id)->ref,
        'descripcion' => ProvArticulos::find($id)->descripcion,
        'existencias' => ProvArticulos::find($id)->existencias
      ];
    }
    return $out;
}

    /**
     * Creates a new ProvInventarioIni model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProvInventarioIni();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProvInventarioIni model.
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


    public function actionModal($submit = false,$id)
{
  $new_model = new ProvInventarioIni();
  $model=$this->findModel($id);


    if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }

    if ($model->load(Yii::$app->request->post()) &&  $new_model->load(Yii::$app->request->post())) {
      // Aperturamos una Transaccion postgresql
      $transaction = ProvInventarioIni::getDb()->beginTransaction();
          try {
            // en este caso enviamos respuesta Json ---
            $new_model->fecha_creation=date("Y-m-d",strtotime("+1 day"));
          if ($model->save() && $new_model->save())  {
            $model->refres();
            $new_model->refresh();

            // ...otras operaciones BD ...
            $transaction->commit();

            Yii::$app->response->format = Response::FORMAT_JSON;

            return [
              'msj'=>'Cierre de inventario: ' .$model->ref . ' procesado con exito',

            ];
          } else {
             Yii::$app->response->format = Response::FORMAT_JSON;
             return ActiveForm::validate($model);
         }
        }
           catch(Exception $e) {
            $transaction->rollBack();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
              'msj'=>'Cierre de inventario: ' .$model->ref . ' no pudo se procesado dirajese al administrador de sistema...',

            ];
          }
        }

      return $this->renderAjax('procesar_modal', [
            'model' => $model,
            'new_model'=>$new_model
        ]);
  }

    /**
     * Deletes an existing ProvInventarioIni model.
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
     * Finds the ProvInventarioIni model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProvInventarioIni the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProvInventarioIni::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
