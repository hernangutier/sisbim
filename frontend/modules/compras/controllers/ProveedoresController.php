<?php

namespace frontend\modules\compras\controllers;

use Yii;
use common\models\Proveedores;
use common\models\ProvProntoPago;
use common\models\ProveedoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * FactProveedoresController implements the CRUD actions for FactProveedores model.
 */
class ProveedoresController extends Controller
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
     * Lists all FactProveedores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProveedoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = 'main';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }






    /**
     * Displays a single FactProveedores model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      // validate if there is a editable input saved via AJAX
      if (Yii::$app->request->post('hasEditable')) {
          // instantiate your book model for saving
          $itemsId = Yii::$app->request->post('editableKey');
          $model = ProvProntoPago::findOne($itemsId);

          // store a default json response as desired by editable
          $out = Json::encode(['output'=>'', 'message'=>'']);

          // fetch the first entry in posted data (there should only be one entry
          // anyway in this array for an editable submission)
          // - $posted is the posted data for Book without any indexes
          // - $post is the converted array for single model validation
          $posted = current($_POST['ProvProntoPago']);
          $post = ['ProvProntoPago' => $posted];

          // load model like any single model validation
          if ($model->load($post)) {
          // can save model or do something before saving model
          $model->save();

          // custom output to return to be displayed as the editable grid cell
          // data. Normally this is empty - whereby whatever value is edited by
          // in the input by user is updated automatically.
          $output = '';

          // specific use case where you need to validate a specific
          // editable column posted when you have more than one
          // EditableColumn in the grid view. We evaluate here a
          // check to see if buy_amount was posted for the Book model
          if (isset($posted['percent'])) {
            $output = Yii::$app->formatter->asDecimal($model->percent, 2);
          }
        if (isset($posted['lim_inf'])) {
            $output = $model->lim_inf;
          }

          // similarly you can check if the name attribute was posted as well
          // if (isset($posted['name'])) {
          // $output = ''; // process as you need
          // }
          $out = Json::encode(['output'=>$output, 'message'=>'']);
          }
          // return ajax json encoded response and exit
          echo $out;
          return;
      }

        $this->layout='main';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FactProveedores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = Proveedores::getInstance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $this->layout = 'main';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FactProveedores model.
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
            ]);
        }
    }

    /**
     * Deletes an existing FactProveedores model.
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
     * Finds the FactProveedores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FactProveedores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proveedores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
