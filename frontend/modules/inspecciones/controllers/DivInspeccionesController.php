<?php

namespace frontend\modules\inspecciones\controllers;

use Yii;
use common\models\DivInspecciones;
use common\models\DivSemovientes;
use common\models\DivInspeccionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;


/**
 * DivInspeccionesController implements the CRUD actions for DivInspecciones model.
 */
class DivInspeccionesController extends Controller
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
     * Lists all DivInspecciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DivInspeccionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DivInspecciones model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

      if (Yii::$app->request->post('hasEditable')) {
          // instantiate your book model for saving
          $dtId = Yii::$app->request->post('editableKey');
          $model = DivSemovientes::findOne($dtId);

          // store a default json response as desired by editable
          $out = Json::encode(['output'=>'', 'message'=>'']);

          // fetch the first entry in posted data (there should only be one entry
          // anyway in this array for an editable submission)
          // - $posted is the posted data for Book without any indexes
          // - $post is the converted array for single model validation
          $posted = current($_POST['DivSemovientes']);
          $post = ['detalle' => $posted];

          if (isset($posted['nbov'])){
              $model->nbov=$posted['nbov'];
              $output=$model->nbov;
              if ($model->save() ) {
                $out = Json::encode(['output'=>$output, 'message'=>'']);
                echo $out;
                return;
              }

          }

          if (isset($posted['sexo'])){
              $model->sexo=$posted['sexo'];
              $output=$model->sexo;
              if ($model->save() ) {
                $out = Json::encode(['output'=>$output, 'message'=>'']);
                echo $out;
                return;
              }

          }

          if (isset($posted['is_auditado'])){
              $model->is_auditado=$posted['is_auditado'];
              $output=$model->is_auditado;
              if ($model->save() ) {
                $out = Json::encode(['output'=>$output, 'message'=>'']);
                echo $out;
                return;
              }

          }


          if (isset($posted['categoria'])){
              $model->sexo=$posted['categoria'];
              $output=$model->sexo;
              if ($model->save() ) {
                $out = Json::encode(['output'=>$output, 'message'=>'']);
                echo $out;
                return;
              }

          }


    }

    $this->layout="main";
    return $this->render('view', [
        'model' => $this->findModel($id),
    ]);

  }

    /**
     * Creates a new DivInspecciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DivInspecciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout="main";
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DivInspecciones model.
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
     * Deletes an existing DivInspecciones model.
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
     * Finds the DivInspecciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DivInspecciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DivInspecciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
