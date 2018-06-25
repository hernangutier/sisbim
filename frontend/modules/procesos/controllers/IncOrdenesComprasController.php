<?php

namespace frontend\modules\procesos\controllers;

use Yii;
use common\models\IncOrdenesCompras;
use common\models\IncOrdenesNulls;
use common\models\IncOrdenesComprasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/**
 * IncOrdenesComprasController implements the CRUD actions for IncOrdenesCompras model.
 */
class IncOrdenesComprasController extends Controller
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


    public function actionProveedoresList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'cedrif'=>'','descripcion' => '']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('vw_proveedores_activos')
            ->where(['like', 'tostring', strtoupper($q)])
            //->where(['id_und_actual'=>$id_und])
            ->limit(40);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id,
                          'cedrif' => Proveedores::find($id)->cedrif,
                          'razon' => Proveedores::find($id)->razon,
                        ];
    }
    return $out;
}

    /**
     * Lists all IncOrdenesCompras models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IncOrdenesComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionNulls($submit = false,$id)
    {
      $model= new IncOrdenesNulls();
      $model->id_oc=$id;
      $model->id_user=Yii::$app->user->identity->id_bm;

      if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
          Yii::$app->response->format = Response::FORMAT_JSON;
          return ActiveForm::validate($model);
      }

      if ($model->load(Yii::$app->request->post())) {
          if ($model->save()) {
              $model->refresh();
              Yii::$app->response->format = Response::FORMAT_JSON;
              return [
                  'message' => '¡Éxito!',
              ];
          } else {
              Yii::$app->response->format = Response::FORMAT_JSON;
              return ActiveForm::validate($model);
          }
      }

      return $this->renderAjax('_form_null', [
          'model' => $model,
      ]);

    }

    /**
     * Displays a single IncOrdenesCompras model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout="main";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IncOrdenesCompras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IncOrdenesCompras();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout="main";
        return $this->render('create', [
            'model' => $model,
        ]);
    }





    /**
     * Updates an existing IncOrdenesCompras model.
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
     * Deletes an existing IncOrdenesCompras model.
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
     * Finds the IncOrdenesCompras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IncOrdenesCompras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IncOrdenesCompras::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
