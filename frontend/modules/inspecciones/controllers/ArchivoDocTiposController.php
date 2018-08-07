<?php

namespace frontend\modules\inspecciones\controllers;

use Yii;
use common\models\ArchivoDocTipos;
use common\models\ArchivoDocTiposSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArchivoDocTiposController implements the CRUD actions for ArchivoDocTipos model.
 */
class ArchivoDocTiposController extends Controller
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
     * Lists all ArchivoDocTipos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArchivoDocTiposSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArchivoDocTipos model.
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
     * Creates a new ArchivoDocTipos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArchivoDocTipos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $this->layout="main";
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArchivoDocTipos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $this->layout="main";
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArchivoDocTipos model.
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
     * Finds the ArchivoDocTipos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArchivoDocTipos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArchivoDocTipos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
