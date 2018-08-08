<?php

namespace frontend\modules\adecuacion\controllers;

use Yii;
use common\models\SdbMunicipios;
use common\models\SdbMunicipiosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SdbMunicipiosController implements the CRUD actions for SdbMunicipios model.
 */
class SdbMunicipiosController extends Controller
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
     * Lists all SdbMunicipios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SdbMunicipiosSearch();
        $searchModel->id_est=1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdbMunicipios model.
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
     * Creates a new SdbMunicipios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SdbMunicipios();
        $model->id_est=1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $this->layout="main";
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SdbMunicipios model.
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
     * Deletes an existing SdbMunicipios model.
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
     * Finds the SdbMunicipios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdbMunicipios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdbMunicipios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
