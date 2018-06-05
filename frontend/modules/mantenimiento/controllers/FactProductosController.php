<?php

namespace frontend\modules\mantenimiento\controllers;

use Yii;
use common\models\FactProductos;
use common\models\FactProductosPrecios;
use common\models\FactProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FactProductosController implements the CRUD actions for FactProductos model.
 */
class FactProductosController extends Controller
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
     * Lists all FactProductos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FactProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = 'main';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FactProductos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'main';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FactProductos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = FactProductos::getInstance();
        //------ Modelo 2 para controlar los precios ----
        $price=FactProductosPrecios::instance();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
        } else {
            $this->layout = 'main';
            return $this->render('create', [
                'model' => $model,
                'price'=>$price,
            ]);
        }
    }

    /**
     * Updates an existing FactProductos model.
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
            $this->layout = 'main';
            return $this->render('update', [
                'model' => $model,
                'price'=>isset($model->idPrecio) ? FactProductosPrecios::instance() : $model->idPrecio
            ]);
        }
    }

    public function actionPrecios($id)

    {
      return $this->renderAjax('_view_price', [
          'model' => FactProductosPrecios::findOne($id),
      ]);
    }

    /**
     * Deletes an existing FactProductos model.
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
     * Finds the FactProductos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FactProductos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FactProductos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
